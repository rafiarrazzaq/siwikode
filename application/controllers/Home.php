<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("HomeModel");
		$this->load->helper('form');
		$this->load->helper('text');
		$this->load->helper('url');
	}

	private function load()
	{
		$page = array(
			"style" => $this->load->view('layouts/style', false, true),
			"header" => $this->load->view('layouts/header', false, true),
			"headerAdmin" => $this->load->view('layouts/headerAdmin', false, true),
			"footer" => $this->load->view('layouts/footer', false, true),
			"script" => $this->load->view('layouts/script', false, true),
		);

		return $page;
	}

	public function index()
	{
		$result["wisata"] = $this->HomeModel->getAll("wisata");

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('index', $result)
		);

		$this->load->view('layouts/layout', $data);
	}

	public function aboutus()
	{
		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('aboutus', false)
		);

		$this->load->view('layouts/layout', $data);
	}

	public function wisataRekreasi()
	{
		$result["wisata"] = $this->db->query("SELECT * FROM wisata WHERE jenis_wisata_id != ''")->result();

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('wisataRekreasi', $result)
		);

		$this->load->view('layouts/layout', $data);
	}

	public function wisataKuliner()
	{
		$result["wisata"] = $this->db->query("SELECT * FROM wisata WHERE jenis_kuliner_id != ''")->result();

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('wisataKuliner', $result)
		);

		$this->load->view('layouts/layout', $data);
	}

	public function registrasiWisataRekreasi()
	{
		$result["jenisWisata"] = $this->HomeModel->getAll("jenis_wisata");

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('registrasiWisataRekreasi', $result)
		);

		$this->load->view('layouts/layout', $data);
	}

	public function createWisataRekreasi()
	{
		$nama = $this->input->post("nama");
		$jenisWisata = $this->input->post("jenisWisata");
		$kontakPerson = $this->input->post("kontakPerson");
		$telpon = $this->input->post("telpon");
		$email = $this->input->post("email");
		$alamatWeb = $this->input->post("alamatWeb");
		$deskripsiWisata = $this->input->post("deskripsiWisata");
		$deskripsiFasilitas = $this->input->post("deskripsiFasilitas");
		$alamatLengkap = $this->input->post("alamatLengkap");
		$latlong = $this->input->post("latlong");
		$rating = $this->input->post("rating");
		$foto = $this->HomeModel->uploadImage("foto");

		$data = array(
			'nama' => $nama,
			'deskripsi' => $deskripsiWisata,
			'jenis_wisata_id' => $jenisWisata,
			'fasilitas' => $deskripsiFasilitas,
			'bintang' => $rating,
			'kontak' => $kontakPerson,
			'alamat' => $alamatLengkap,
			'latlong' => $latlong,
			'email' => $email,
			'web' => $alamatWeb,
			'foto' => $foto,
			'no_hp' => $telpon
		);

		$this->db->insert('wisata', $data);

		$wisataId = $this->db->insert_id();

		$count = count($_FILES['gallery']['name']);

		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['gallery']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
				$_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
				$_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['overwrite'] = true;
				$config['file_name'] = $_FILES['gallery']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];

					$data = array(
						'filename' => $filename,
						'wisata_id' => $wisataId,
					);

					$this->db->insert('galery', $data);
				}
			}
		}


		// Testimoni 1
		$namatesti1 = $this->input->post("namatesti1");
		$emailtesti1 = $this->input->post("emailtesti1");
		$ratingtesti1 = $this->input->post("ratingtesti1");
		$profesi1 = $this->input->post("profesi1");
		$komentartesti1 = $this->input->post("komentartesti1");

		$data = array(
			'nama' => $namatesti1,
			'email' => $emailtesti1,
			'wisata_id' => $wisataId,
			'profesi_id' => $profesi1,
			'rating' => $ratingtesti1,
			'komentar' => $komentartesti1
		);
		
		$this->db->insert('testimoni', $data);

		// Testimoni 2
		$namatesti2 = $this->input->post("namatesti2");
		$emailtesti2 = $this->input->post("emailtesti2");
		$ratingtesti2 = $this->input->post("ratingtesti2");
		$profesi2 = $this->input->post("profesi2");
		$komentartesti2 = $this->input->post("komentartesti2");

		$data = array(
			'nama' => $namatesti2,
			'email' => $emailtesti2,
			'wisata_id' => $wisataId,
			'profesi_id' => $profesi2,
			'rating' => $ratingtesti2,
			'komentar' => $komentartesti2
		);
		
		$this->db->insert('testimoni', $data);

		// Testimoni 2
		$namatesti3 = $this->input->post("namatesti3");
		$emailtesti3 = $this->input->post("emailtesti3");
		$ratingtesti3 = $this->input->post("ratingtesti3");
		$profesi3 = $this->input->post("profesi3");
		$komentartesti3 = $this->input->post("komentartesti3");

		$data = array(
			'nama' => $namatesti3,
			'email' => $emailtesti3,
			'wisata_id' => $wisataId,
			'profesi_id' => $profesi3,
			'rating' => $ratingtesti3,
			'komentar' => $komentartesti3
		);
		
		$this->db->insert('testimoni', $data);

		$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
		redirect('home/registrasiWisataRekreasi');
	}

	public function registrasiWisataKuliner()
	{
		$result["jenisWisata"] = $this->HomeModel->getAll("jenis_kuliner");
		$result["profesi"] = $this->HomeModel->getAll("profesi");

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('registrasiWisataKuliner', $result)
		);

		$this->load->view('layouts/layout', $data);
	}

	public function createWisataKuliner()
	{
		$nama = $this->input->post("nama");
		$jenisWisata = $this->input->post("jenisWisata");
		$kontakPerson = $this->input->post("kontakPerson");
		$telpon = $this->input->post("telpon");
		$email = $this->input->post("email");
		$alamatWeb = $this->input->post("alamatWeb");
		$deskripsiWisata = $this->input->post("deskripsiWisata");
		$deskripsiFasilitas = $this->input->post("deskripsiFasilitas");
		$alamatLengkap = $this->input->post("alamatLengkap");
		$latlong = $this->input->post("latlong");
		$rating = $this->input->post("rating");
		$foto = $this->HomeModel->uploadImage("foto");

		$data = array(
			'nama' => $nama,
			'deskripsi' => $deskripsiWisata,
			'jenis_kuliner_id' => $jenisWisata,
			'fasilitas' => $deskripsiFasilitas,
			'bintang' => $rating,
			'kontak' => $kontakPerson,
			'alamat' => $alamatLengkap,
			'latlong' => $latlong,
			'email' => $email,
			'web' => $alamatWeb,
			'foto' => $foto,
			'no_hp' => $telpon
		);

		$this->db->insert('wisata', $data);

		$wisataId = $this->db->insert_id();

		$count = count($_FILES['gallery']['name']);

		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['gallery']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
				$_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
				$_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['overwrite'] = true;
				$config['file_name'] = $_FILES['gallery']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];

					$data = array(
						'filename' => $filename,
						'wisata_id' => $wisataId,
					);

					$this->db->insert('galery', $data);
				}
			}
		}

		// Testimoni 1
		$namatesti1 = $this->input->post("namatesti1");
		$emailtesti1 = $this->input->post("emailtesti1");
		$ratingtesti1 = $this->input->post("ratingtesti1");
		$profesi1 = $this->input->post("profesi1");
		$komentartesti1 = $this->input->post("komentartesti1");

		$data = array(
			'nama' => $namatesti1,
			'email' => $emailtesti1,
			'wisata_id' => $wisataId,
			'profesi_id' => $profesi1,
			'rating' => $ratingtesti1,
			'komentar' => $komentartesti1
		);
		
		$this->db->insert('testimoni', $data);

		// Testimoni 2
		$namatesti2 = $this->input->post("namatesti2");
		$emailtesti2 = $this->input->post("emailtesti2");
		$ratingtesti2 = $this->input->post("ratingtesti2");
		$profesi2 = $this->input->post("profesi2");
		$komentartesti2 = $this->input->post("komentartesti2");

		$data = array(
			'nama' => $namatesti2,
			'email' => $emailtesti2,
			'wisata_id' => $wisataId,
			'profesi_id' => $profesi2,
			'rating' => $ratingtesti2,
			'komentar' => $komentartesti2
		);
		
		$this->db->insert('testimoni', $data);

		// Testimoni 2
		$namatesti3 = $this->input->post("namatesti3");
		$emailtesti3 = $this->input->post("emailtesti3");
		$ratingtesti3 = $this->input->post("ratingtesti3");
		$profesi3 = $this->input->post("profesi3");
		$komentartesti3 = $this->input->post("komentartesti3");

		$data = array(
			'nama' => $namatesti3,
			'email' => $emailtesti3,
			'wisata_id' => $wisataId,
			'profesi_id' => $profesi3,
			'rating' => $ratingtesti3,
			'komentar' => $komentartesti3
		);
		
		$this->db->insert('testimoni', $data);

		$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
		redirect('home/registrasiWisataRekreasi');
	}

	public function detailWisata($wisataId)
	{
		$result["wisata"] = $this->HomeModel->getWhere("wisata", array("id" => $wisataId));
		$result["galery"] = $this->HomeModel->getWhere("galery", array("wisata_id" => $wisataId));
		$result["testimoni"] = $this->db->query("SELECT testimoni.nama as namatesti, testimoni.*, profesi.* FROM testimoni LEFT JOIN profesi ON testimoni.profesi_id = profesi.id WHERE wisata_id = $wisataId")->result();

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('detailWisata', $result)
		);

		$this->load->view('layouts/layout', $data);
	}


	public function login()
	{
		$this->load->view('login');
	}

	public function postLogin()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		if ($username != "admin") {
			$this->session->set_flashdata('gagal', 'Username yang anda masukan salah!');
			redirect('home/login');
		}

		if ($password != "123") {
			$this->session->set_flashdata('gagal', 'Password yang anda masukan salah!');
			redirect('home/login');
		}

		redirect('home/adminWisataRekreasi');
	}

	public function adminWisataRekreasi()
	{
		$result["wisata"] = $this->db->query("SELECT * FROM wisata WHERE jenis_wisata_id != ''")->result();

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('adminWisataRekreasi', $result)
		);

		$this->load->view('layouts/layoutAdmin', $data);
	}

	public function adminWisataKuliner()
	{
		$result["wisata"] = $this->db->query("SELECT * FROM wisata WHERE jenis_kuliner_id != ''")->result();

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('adminWisataKuliner', $result)
		);

		$this->load->view('layouts/layoutAdmin', $data);
	}

	public function logout()
	{
		redirect('home/index');
	}

	public function detailWisataAdmin($wisataId)
	{
		$result["wisata"] = $this->HomeModel->getWhere("wisata", array("id" => $wisataId));
		$result["galery"] = $this->HomeModel->getWhere("galery", array("wisata_id" => $wisataId));

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('detailWisata', $result)
		);

		$this->load->view('layouts/layoutAdmin', $data);
	}

	public function editWisataRekreasi($wisataId)
	{
		$result["wisata"] = $this->HomeModel->getWhere("wisata", array("id" => $wisataId));
		$result["galery"] = $this->HomeModel->getWhere("galery", array("wisata_id" => $wisataId));
		$result["jenisWisata"] = $this->HomeModel->getAll("jenis_wisata");

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('editWisataRekreasi', $result)
		);

		$this->load->view('layouts/layoutAdmin', $data);
	}

	public function deleteGalery($galeryId, $wisataId)
	{
		$this->db->delete('galery', array('id_galery' => $galeryId));
		redirect('home/editWisataRekreasi/' . $wisataId);
	}

	public function updateWisataRekreasi()
	{
		$wisataId = $this->input->post("wisataId");
		$nama = $this->input->post("nama");
		$jenisWisata = $this->input->post("jenisWisata");
		$kontakPerson = $this->input->post("kontakPerson");
		$telpon = $this->input->post("telpon");
		$email = $this->input->post("email");
		$alamatWeb = $this->input->post("alamatWeb");
		$deskripsiWisata = $this->input->post("deskripsiWisata");
		$deskripsiFasilitas = $this->input->post("deskripsiFasilitas");
		$alamatLengkap = $this->input->post("alamatLengkap");
		$latlong = $this->input->post("latlong");
		$rating = $this->input->post("rating");
		$fotoLama = $this->input->post("fotoLama");

		if (!empty($_FILES["foto"]["name"])) {
			$foto = $this->HomeModel->uploadImage("foto");
		} else {
			$foto = $fotoLama;
		}

		$data = array(
			'nama' => $nama,
			'deskripsi' => $deskripsiWisata,
			'jenis_wisata_id' => $jenisWisata,
			'fasilitas' => $deskripsiFasilitas,
			'bintang' => $rating,
			'kontak' => $kontakPerson,
			'alamat' => $alamatLengkap,
			'latlong' => $latlong,
			'email' => $email,
			'web' => $alamatWeb,
			'foto' => $foto,
			'no_hp' => $telpon
		);

		$this->db->where('id', $wisataId);
		$this->db->update('wisata', $data);

		for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {

			if (!empty($_FILES['gallery']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
				$_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
				$_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['overwrite'] = true;
				$config['file_name'] = $_FILES['gallery']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];

					$data = array(
						'filename' => $filename,
						'wisata_id' => $wisataId,
					);

					$this->db->insert('galery', $data);
				}
			}
		}

		$this->session->set_flashdata('success', 'Data Berhasil di ubah');
		redirect('home/editWisataRekreasi/' . $wisataId);
	}

	public function editWisataKuliner($wisataId)
	{
		$result["wisata"] = $this->HomeModel->getWhere("wisata", array("id" => $wisataId));
		$result["galery"] = $this->HomeModel->getWhere("galery", array("wisata_id" => $wisataId));
		$result["jenisWisata"] = $this->HomeModel->getAll("jenis_kuliner");

		$data = array(
			"page" => $this->load(),
			"content" => $this->load->view('editWisataKuliner', $result)
		);

		$this->load->view('layouts/layoutAdmin', $data);
	}

	public function updateWisataKuliner()
	{
		$wisataId = $this->input->post("wisataId");
		$nama = $this->input->post("nama");
		$jenisWisata = $this->input->post("jenisWisata");
		$kontakPerson = $this->input->post("kontakPerson");
		$telpon = $this->input->post("telpon");
		$email = $this->input->post("email");
		$alamatWeb = $this->input->post("alamatWeb");
		$deskripsiWisata = $this->input->post("deskripsiWisata");
		$deskripsiFasilitas = $this->input->post("deskripsiFasilitas");
		$alamatLengkap = $this->input->post("alamatLengkap");
		$latlong = $this->input->post("latlong");
		$rating = $this->input->post("rating");
		$fotoLama = $this->input->post("fotoLama");

		if (!empty($_FILES["foto"]["name"])) {
			$foto = $this->HomeModel->uploadImage("foto");
		} else {
			$foto = $fotoLama;
		}

		$data = array(
			'nama' => $nama,
			'deskripsi' => $deskripsiWisata,
			'jenis_kuliner_id' => $jenisWisata,
			'fasilitas' => $deskripsiFasilitas,
			'bintang' => $rating,
			'kontak' => $kontakPerson,
			'alamat' => $alamatLengkap,
			'latlong' => $latlong,
			'email' => $email,
			'web' => $alamatWeb,
			'foto' => $foto,
			'no_hp' => $telpon
		);

		$this->db->where('id', $wisataId);
		$this->db->update('wisata', $data);

		for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {

			if (!empty($_FILES['gallery']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['gallery']['name'][$i];
				$_FILES['file']['type'] = $_FILES['gallery']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['gallery']['error'][$i];
				$_FILES['file']['size'] = $_FILES['gallery']['size'][$i];

				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['overwrite'] = true;
				$config['file_name'] = $_FILES['gallery']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];

					$data = array(
						'filename' => $filename,
						'wisata_id' => $wisataId,
					);

					$this->db->insert('galery', $data);
				}
			}
		}

		$this->session->set_flashdata('success', 'Data Berhasil di ubah');
		redirect('home/editWisataKuliner/' . $wisataId);
	}

	public function deleteWisataRekreasi($wisataId)
	{
		$this->db->delete('wisata', array('id' => $wisataId));
		redirect('home/adminWisataRekreasi/' . $wisataId);
	}

	public function deleteWisataKuliner($wisataId)
	{
		$this->db->delete('wisata', array('id' => $wisataId));
		redirect('home/adminWisataKuliner/' . $wisataId);
	}
}
