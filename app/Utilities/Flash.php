<?php

namespace App\Utilities;

class Flash {

	public function create($title, $message, $level) {
		return session()->flash('flash_message',[
			'level' => $level,
			'title' => $title,
			'message' => $message			
		]);
	}

	public function info($title, $message) {
		return $this->create($title, $message, 'info');
	}

	public function success($title, $message) {
		return $this->create($title, $message, 'success');
	}

	public function warning($title, $message) {
		return $this->create($title, $message, 'warning');
	}

	public function error($title, $message) {
		return $this->create($title, $message, 'error');
	}
}