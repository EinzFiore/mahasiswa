<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_data extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }
    

    function index(){
        $data['judul']="Homepage | Web Data";
        $this->load->view('head',$data);
        $this->load->view('data_mahasiswa');
        $this->load->view('footer');
    }
    
    function data_page(){
        $data = [
            'judul' => "Halaman Data | Web Data",
            'd_mahasiswa' => $this->M_data->getData()->result()
        ];
        $this->load->view('head',$data);
        $this->load->view('halaman_data',$data);
        $this->load->view('footer');
    }
	
    function tambah_data(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $email = $this->input->post('email');
        $kampus = $this->input->post('kampus');
        $quotes = $this->input->post('quotes');
        $jk = $this->input->post('jk');

        $data = array (
            'nim' => $nim,
            'nama_lengkap' => $nama,
            'prodi' => $prodi,
            'email' => $email,
            'kampus' => $kampus,
            'quotes' => $quotes,
            'jk' => $jk
        );

        $this->M_data->add_data($data,'data_mahasiswa');
        
        redirect('c_data/data_page');
    }

    // update
    function update_data($nim)
    {
        $data = array (
            'nama_lengkap' => $this->input->post('nama'), 
            'jk' => $this->input->post('jk'), 
            'prodi' => $this->input->post('prodi'), 
            'kampus' => $this->input->post('kampus'), 
            'quotes' => $this->input->post('quotes') 
        );
        $this->db->where('nim',$nim);
        $this->db->update('data_mahasiswa',$data);
        redirect('C_data/data_page');
    }
}




/* End of file filename.php */
