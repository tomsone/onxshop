<?php
/**
 *
 * Copyright (c) 2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */
 
class education_survey_entry_answer extends Onxshop_Model {

	/**
	 * PRIMARY KEY
	 *
	 */
	public $id;
	
	/**
	 * survey_entry_id
	 */
	public $survey_entry_id;
	
	/**
	 * question_id
	 */
	public $question_id;
	
	/**
	 * question_answer_id
	 * this can be null for question type text
	 */
	public $question_answer_id;
	
	/**
	 * value
	 * this is for question type text
	 */
	public $value;
	
	/**
	 * created
	 */
	public $created;

	/**
	 * modified
	 */
	public $modified;
	
	/**
	 * publish
	 */
	public $publish;

	/**
	 * hashMap
	 */
	 
	public $_hashMap = array(
		'id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'survey_entry_id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'question_id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'question_answer_id'=>array('label' => '', 'validation'=>'int', 'required'=>false), //this is required for radio, select and checkbox questions
		'value'=>array('label' => '', 'validation'=>'string', 'required'=>false), //this is required for text type questions
		'created'=>array('label' => '', 'validation'=>'datetime', 'required'=>true),
		'modified'=>array('label' => '', 'validation'=>'datetime', 'required'=>false),
		'publish'=>array('label' => '', 'validation'=>'int', 'required'=>false)
	);
	
	/**
	 * create table sql
	 */
	 
	private function getCreateTableSql() {
	
		$sql = "
CREATE TABLE education_survey_entry_answer (
	id serial PRIMARY KEY NOT NULL,
	survey_entry_id int NOT NULL REFERENCES education_survey_entry ON UPDATE CASCADE ON DELETE CASCADE,
	question_id int NOT NULL REFERENCES education_survey_question ON UPDATE CASCADE ON DELETE RESTRICT,
	question_answer_id int REFERENCES education_survey_question_answer ON UPDATE CASCADE ON DELETE RESTRICT,
	value text,
	created timestamp(0) without time zone DEFAULT now() NOT NULL,
	modified timestamp(0) without time zone DEFAULT now(),
	publish smallint DEFAULT 0
);
		";
		
		return $sql;
	}
	
	/**
	 * getAnswersForQuestion
	 */
	 
	public function getAnswersForQuestion($question_id, $relation_subject = false) {
		
		if (!is_numeric($question_id)) return false;
		
		if ($relation_subject) $sql = "
SELECT education_survey_entry_answer.* FROM education_survey_entry 
LEFT OUTER JOIN education_survey_entry_answer ON (education_survey_entry.id = education_survey_entry_answer.survey_entry_id)
WHERE education_survey_entry.relation_subject LIKE '{$relation_subject}' AND education_survey_entry_answer.question_id = {$question_id};";
		else $sql = "SELECT * FROM education_survey_entry_answer WHERE question_id = {$question_id}";
		
		$list = $this->executeSql($sql);
		
		return $list;
	}
	
	/**
	 * getAnswerUsageCount
	 */
	 
	public function getAnswerUsageCount($question_answer_id, $relation_subject = false) {
	
		if (!is_numeric($question_answer_id)) return false;
		
		if ($relation_subject) $sql = "
SELECT education_survey_entry_answer.* FROM education_survey_entry 
LEFT OUTER JOIN education_survey_entry_answer ON (education_survey_entry.id = education_survey_entry_answer.survey_entry_id)
WHERE education_survey_entry.relation_subject LIKE '{$relation_subject}' AND education_survey_entry_answer.question_answer_id = {$question_answer_id};";
		else $sql = "SELECT * FROM education_survey_entry_answer WHERE question_answer_id = {$question_answer_id}";
		
		$list = $this->executeSql($sql);

		$usage_count = count($list);
		
		return $usage_count;
	}

	/**
	 * saveAnswer
	 */
	
	public function saveAnswer($data) {
	
		if (!is_array($data)) {
			msg("survey_entry_answer: data is not array", 'error');
			return false;
		}
		
		$data['created'] = date('c');
		
		return $this->save($data);
		
	}
}
