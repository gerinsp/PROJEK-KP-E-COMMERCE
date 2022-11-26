<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $is_login    = $this->session->userdata('is_login');

        if ($is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        if (!$_POST) {
            $input    = (object) $this->login->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $data['title']    = 'Login';
            $data['input']    = $input;
            $data['page']    = 'pages/auth/login';

            $this->view($data);
            return;
        }

        if ($this->login->run($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login!');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'E-Mail atau Password salah atau akun Anda sedang tidak aktif!');
            redirect(base_url('login'));
        }
    }

    public function reset_password_email()
    {
        $data['title'] = 'Reset Password';
        $data['page']  = 'pages/auth/reset_password_email';

        $this->view($data);
    }
    public function email_reset_password_validation()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        if ($this->form_validation->run()) {

            $email = $this->input->post('email');
            $reset_key = random_string('alnum', 50);

            if ($this->Reset_model->update_reset_key($email, $reset_key)) {
                $this->load->library('email');
                $config = array();
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'Codeigniter';
                $config['protocol'] = "smtp";
                $config['mailtype'] = "html";
                $config['smtp_host'] = "ssl://smtp.googlemail.com"; //pengaturan smtp
                $config['smtp_port'] = "465";
                $config['smtp_timeout'] = "5";
                $config['smtp_user'] = "gerinsena21@gmail.com"; // isi dengan email kamu
                $config['smtp_pass'] = "gerinsp123"; // isi dengan password kamu
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;
                //memanggil library email dan set konfigurasi untuk pengiriman email

                $this->email->initialize($config);
                //konfigurasi pengiriman
                $this->email->from($config['smtp_user']);
                $this->email->to($this->input->post('email'));
                $this->email->subject("Reset your password");

                $message = "<p>Anda melakukan permintaan reset password</p>";
                $message .= "<a href='" . site_url('login/reset_password/' . $reset_key) . "'>klik reset password</a>";
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->session->set_flashdata('success', "silahkan cek email <b>" . $this->input->post('email') . '</b> untuk melakukan reset password');
                    redirect(base_url('login/reset_password_email'));
                } else {
                    $this->session->set_flashdata('error', 'Berhasil melakukan registrasi, gagal mengirim verifikasi email');
                    redirect(base_url('login/reset_password_email'));
                }
            } else {
                $this->session->set_flashdata('error', 'Email yang anda masukan belum terdaftar');
                redirect(base_url('login/reset_password_email'));
                die();
            }
        } else {
            $data['title'] = 'Reset Password';
            $data['page']  = 'pages/auth/reset_password_email';

            $this->view($data);
        }
    }

    public function reset_password()
    {
        $reset_key = $this->uri->segment(3);

        if (!$reset_key) {
            $this->session->set_flashdata('error', 'Jangan Dihapus');
            redirect(base_url('login/reset_password'));
            die();
        }

        if ($this->Reset_model->check_reset_key($reset_key) == 1) {
            $data['title'] = 'Reset Password';
            $data['page']  = 'pages/auth/reset_password';

            $this->view($data);
        } else {
            $this->session->set_flashdata('error', 'reset key salah');
            redirect(base_url('login/reset_password'));
            die();
        }
    }

    public function reset_password_validation()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[password_confirmation]');
        $this->form_validation->set_rules('password_confirmation', 'password confirmation', 'required|min_length[6]|matches[password]');

        if ($this->form_validation->run()) {

            $reset_key = $this->input->post('reset_key');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            if ($this->Reset_model->reset_password($reset_key, $password)) {
                $this->session->set_flashdata('success', 'Password anda telah berhasil diubah');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('error', '');
                redirect(base_url('login'));
            }
        } else {
            $data['title'] = 'Reset Password';
            $data['page']  = 'pages/auth/reset_password';

            $this->view($data);
        }
    }
}

/* End of file Login.php */
