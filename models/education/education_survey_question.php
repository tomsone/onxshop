<?php
/**
 *
 * Copyright (c) 2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */
 
class education_survey_question extends Onxshop_Model {

	/**
	 * PRIMARY KEY
	 *
	 */
	public $id;
	
	/**
	 * survey_id
	 */
	public $survey_id;
	
	/**
	 * parent
	 */
	public $parent;
	
	/**
	 * step (group, part, page No.)
	 */
	public $step; 
	
	/**
	 * title
	 */
	public $title;
	
	/**
	 * description
	 * can use ### 
	 */
	public $description;
	
	/**
	 * mandatory
	 */
	public $mandatory;
	
	/**
	 * type 
	 * (text, checkbox, select, multi-select, radio)
	 */
	public $type;
	
	/**
	 * priority
	 */
	public $priority;

	/**
	 * publish
	 */
	public $publish;

	/**
	 * hashMap
	 */
	 
	public $_hashMap = array(
		'id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'survey_id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'parent'=>array('label' => '', 'validation'=>'int', 'required'=>false),
		'step'=>array('label' => '', 'validation'=>'int', 'required'=>false),
		'title'=>array('label' => '', 'validation'=>'string', 'required'=>true),
		'description'=>array('label' => '', 'validation'=>'string', 'required'=>false),
		'mandatory'=>array('label' => '', 'validation'=>'int', 'required'=>false),
		'type'=>array('label' => '', 'validation'=>'string', 'required'=>true),
		'priority'=>array('label' => '', 'validation'=>'int', 'required'=>false),
		'publish'=>array('label' => '', 'validation'=>'int', 'required'=>false),
		'weight'=>array('label' => '', 'validation'=>'int', 'required'=>false)
	);
	
	/**
	 * create table sql
	 */
	 
	private function getCreateTableSql() {
	
		$sql = "
CREATE TABLE education_survey_question (
	id serial PRIMARY KEY NOT NULL,
	survey_id int NOT NULL REFERENCES education_survey ON UPDATE CASCADE ON DELETE CASCADE,
	parent int REFERENCES education_survey_question ON UPDATE CASCADE ON DELETE CASCADE,
	step smallint DEFAULT 1,
	title varchar(255) NOT NULL,
	description text,
	mandatory smallint DEFAULT 1,
	type varchar(255) NOT NULL,
	priority smallint DEFAULT 0,
	publish smallint DEFAULT 1,
	weight real NOT NULL DEFAULT 1
);
		";
		
		return $sql;
	}
	
	/**
	 * getDetail
	 */
	 
	public function getDetail($question_id) {
		
		if (!is_numeric($question_id)) {
			msg("Question ID is not numeric", 'error');
			return false;
		}
		
		$detail = $this->detail($question_id);
		
		return $detail;
	}
	
	/**
	 * list questions
	 */
	 
	public function listQuestions($survey_id) {
	
		if (!is_numeric($survey_id)) {
			msg("Survey ID is not numeric", 'error');
			return false;
		}
		
		$question_list = $this->listing("survey_id = $survey_id", 'id ASC, priority DESC');
		
		require_once('models/education/education_survey_question_answer.php');
		$SurveyQuestionAnswer = new education_survey_question_answer();
		
		foreach ($question_list as $k=>$item) {
			if ($item['type'] != 'text') $question_list[$k]['answer_list'] = $SurveyQuestionAnswer->listAnswersForQuestion($item['id']);
		}
		
		return $question_list;
		
	}
	
	/**
	 * updateQuestion
	 */
	
	public function saveQuestion($data) {
	
		if (!is_array($data)) return false;

		return $this->save($data);
		
	}

}
