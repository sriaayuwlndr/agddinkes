<?php defined('BASEPATH') or exit('No direct script access allowed');

class JadwalKerja extends CI_Controller
{

	function __construct()
	{
        parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelJadwalKerja');
        $this->load->model('ModelLaporan');
	}

	public function index() //MENAMPILKAN JADWAL KERJA SHIFT
	{
		$data['Title'] 					= 'Jadwal Kerja Non Shift | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');
		$GetJabatan						= $this->ModelJadwalKerja->GetJabatan($IdPegawai);
		$IdJabatan 						= $GetJabatan->IdJabatan;
		$data['GetBawahan'] 			= $this->ModelJadwalKerja->GetBawahan($IdJabatan);
		$this->load->view('agd/ekinerja/jadwalkerja/index', $data);
	}

	public function perencanaan($IdPegawai)
	{
		$data['Title'] 					= 'Jadwal Perencanaan | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';



		if(!empty($this->input->post('tgl')) && ($this->input->post('tgl') <> ""))
		{

			$Bulan = date('m', strtotime($this->input->post('tgl')));
			$Tahun = date('Y', strtotime($this->input->post('tgl')));
		}

		else
		{
			$Bulan = date('m');
			$Tahun = date('Y');
		}

		$data['GetJadwalPerencanaan'] 			= $this->ModelJadwalKerja->GetJadwalPerencanaan($IdPegawai, $Bulan, $Tahun); 
		$data['GetPegawai'] 					= $this->ModelJadwalKerja->GetPegawai($IdPegawai);
		$this->load->view('agd/ekinerja/jadwalkerja/perencanaan', $data);
	}

	public function realisasi($IdPegawai)
	{
		$data['Title'] 					= 'Jadwal Perencanaan | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';



		if(!empty($this->input->post('tgl')) && ($this->input->post('tgl') <> ""))
		{

			$Bulan = date('m', strtotime($this->input->post('tgl')));
			$Tahun = date('Y', strtotime($this->input->post('tgl')));
		}

		else
		{
			$Bulan = date('m');
			$Tahun = date('Y');
		}

		$data['GetJadwalRealisasi'] 			= $this->ModelJadwalKerja->GetJadwalRealisasi($IdPegawai, $Bulan, $Tahun); 
		$data['GetPegawai'] 					= $this->ModelJadwalKerja->GetPegawai($IdPegawai);
		$this->load->view('agd/ekinerja/jadwalkerja/realisasi', $data);
	}

	public function upload() //MENAMPILKAN FORM UPLOAD SHIFT
	{
		$data['Title'] 					= 'Upload Jadwal Kerja | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$data['GetBulan'] 				= $this->ModelJadwalKerja->GetBulan();
		$this->load->view('agd/ekinerja/jadwalkerja/upload', $data);
	}

	public function submitupload() 
	{
		// LOAD PLUGIN PHP EXCEL
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$TahunGaji = $this->input->post('Tahun');
		$BulanGaji = $this->input->post('Bulan');
		// $JenisJadwal       = $this->input->post('JenisJadwal');
		$startdate = 0;


		if (!empty($_FILES['userfile']['name'])) 
		{
			$uploaddir             		= "uploaddata/jadwalkerja/uploadatasan/";
			$config['upload_path'] 		= "$uploaddir";
			$config['allowed_types']	= 'xlsx|xls';
			$config['max_size'] 		= '10000';
			$config['encrypt_name']     = true;

			$this->load->library('upload', $config);

			foreach ($_FILES as $row=> $val)
			{
				$config['file_name'] = url_title($this->input->post($row));
				$this->upload->initialize($config);

				if (!$this->upload->do_upload($row)) 
				{
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('msg', 'Sorry Error To Upload');
					print_r($error);
				}

				else 
				{
					$data = array('upload_data'=> $this->upload->data());
					$inputFileName = $uploaddir . $data['upload_data']['file_name'];

					try {

						$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						$objReader = PHPExcel_IOFactory::createReader($inputFileType);
						$objPHPExcel = $objReader->load($data['upload_data']['full_path']);
					}

					catch (Exception $e) {
						die('Error loading file "'. pathinfo($data['upload_data']['file_name'], PATHINFO_BASENAME) . '": '. $e->getMessage());
					}

					$sheetData=$objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

					foreach ($sheetData as $i=> $v)
					{
						if ($i > 1)
						{
							$data=array_filter($v);

							foreach ($v as $key=> $val)
							{
								$colNumber=PHPExcel_Cell::columnIndexFromString($key);
								$highestColumn=$objPHPExcel->getActiveSheet()->getHighestDataColumn();
								$highestcolNumber=PHPExcel_Cell::columnIndexFromString($highestColumn);


								if ($key !='A'&& !empty($v['A']) && !empty($val))
								{
									if ($colNumber > 3)
									{
										$startdate++;
										$curr = $startdate . "-". $BulanGaji . "-". $TahunGaji;
										$wday = date('Y-m-d', strtotime("$curr"));

										$IdPegawai  	= $v['A'];
										$JenisJadwal	= $v['C'];
										$JadwalKerja 	= $wday;
										$IdWaktuKerja 	= $val;
										$IdPegawaiUpload = $this->session->userdata('IdPegawai');
										$this->db->query("EXEC AUDMasterJadwalKerja '$IdPegawai','$JenisJadwal','$JadwalKerja', '$IdWaktuKerja','$IdPegawaiUpload','','A' ");
									}
								}
							}

							$startdate = 0;
						}
					}

					unlink($inputFileName);
					$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Jadwal Kerja Berhasil Diinput!</div>');
					redirect('agd/ekinerja/jadwalkerja/upload', 'refresh');
				}
			}
		}

		else 
		{
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Gagal! File Kosong!</div>');
			redirect('agd/ekinerja/jadwalkerja/upload', 'refresh');
		}
	}
}