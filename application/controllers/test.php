	if ($user) {
	// jika usernya ada

	if ($user['is_active']== 1) {
	// cek password
	if (password_verify($password, $user['password'])) {
	# code...
	$data =[
	'email' => $user['email'],
	'role_id' => $user['role_id'],
	];
	$this->session->set_userdata($data);
	if ($user['role_id']== 1) {
	redirect('admin');
	}else {
	redirect('user');
	}

	redirect('user');
	}else{
	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
	redirect('auth');
	}
	}else{
	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email not activited</div>');
	redirect('auth');
	}

	}else{

	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email not registered</div>');
	redirect('auth');
	}
	t