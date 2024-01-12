<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['nama'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda telah diperbarui!!</div>');
            redirect('user');
        }
    }

    public function gantiKataSandi()
    {
        $data['title'] = 'Ganti Kata Sandi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['nama'];

        $this->form_validation->set_rules('sandi_sekarang', 'Sandi Sekarang', 'required|trim');
        $this->form_validation->set_rules('sandi_baru1', 'Sandi Baru', 'required|trim|min_length[3]|matches[sandi_baru2]');
        $this->form_validation->set_rules('sandi_baru2', 'Sandi Baru', 'required|trim|min_length[3]|matches[sandi_baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/KataSandi', $data);
            $this->load->view('templates/footer');
        } else {
            $sandi_sekarang = $this->input->post('sandi_sekarang');
            $sandi_baru = $this->input->post('sandi_baru1');
            if (!password_verify($sandi_sekarang, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi saat ini salah!!!, Anda harus mengisi dengan benar jika ingin mengganti kata sandi</div>');
                redirect('user/gantiKataSandi');
            } else {
                if ($sandi_sekarang == $sandi_baru) {
                    // Jika kata sandi sama maka akan mencetak ini
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi lama</div>');
                    redirect('user/gantiKataSandi');
                } else {
                    // jika password tidak sama maka ok
                    $password_hash = password_hash($sandi_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata berhasil sandi diubah</div>');
                    redirect('user/gantiKataSandi');
                }
            }
        }
    }

    public function checkUser()
    {
        // Dapatkan role_id dari sesuatu (misalnya, dari sesi atau suatu parameter)
        $role_id = $this->session->userdata('role_id'); // Sesuaikan dengan implementasi sesi Anda

        // Ambil informasi pengguna berdasarkan role_id
        $user = $this->db->get_where('user', ['role_id' => $role_id])->row_array();

        if ($user['role_id'] == 1) {
            // Jika pengguna memiliki role_id 1, redirect ke admin dashboard
            redirect('admin');
        } else {
            // Jika pengguna memiliki role_id yang berbeda, redirect ke profil pengguna
            redirect('user');
        }
    }
}
