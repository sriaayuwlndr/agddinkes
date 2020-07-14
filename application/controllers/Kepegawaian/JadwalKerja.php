<?php defined('BASEPATH') or exit('No direct script access allowed');

class JadwalKerja extends CI_Controller
{

	function __construct()
	{
        parent::__construct();

  //       if ($this->session->userdata('masuk') !=TRUE) 
		// {
  //         $url=base_url('login');
  //         redirect($url);
  //       }

        $this->load->model('ModelJadwalKerja');
        $this->load->model('ModelLaporan');
	}

	public function Shift() //MENAMPILKAN JADWAL KERJA SHIFT
	{
		$data['GetJadwalKerjaShift'] = $this->ModelJadwalKerja->getJadwalKerjaShift();
		$this->load->view('admin/jadwalkerja/shift', $data);
	}

	public function UploadShift() //MENAMPILKAN FORM UPLOAD SHIFT
	{
		$data['GetBulan']=$this->ModelLaporan->getBulan();
		$data['GetTahun']=$this->ModelLaporan->getTahun();
		$this->load->view('admin/jadwalkerja/uploadshift', $data);
	}

	// public function SubmitUploadShift() 
	// {
	// 		// LOAD PLUGIN PHP EXCEL
	//     include APPPATH.'third_party/PHPExcel/PHPExcel.php';

	//       $config['upload_path'] = realpath('UploadData/JadwalKerja/Shift/');
	//        $config['allowed_types'] = 'xlsx|xls';
	//        $config['max_size'] = '10000';
	//        $config['encrypt_name'] = true;

	//        $this->load->library('upload', $config);

	//        if (!$this->upload->do_upload()) 
	//        {
	//        	 //MENAMPILKAN PESAN BAHWA UPLOAD GAGAL
	//            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');

	//            //redirect halaman
	//            redirect('kepegawaian/jadwalkerja/uploadshift');
	//       	}

	//       	else
	//       	{
	//       		$data_upload 		= $this->upload->data();
	//       		$excelreader     	= new PHPExcel_Reader_Excel2007();
	//       		$loadexcel         	= $excelreader->load('UploadData/JadwalKerja/Shift/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
	//       		$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	//       		$data = array();


	//       		$numrow = 1;
	//            foreach($sheet as $row)
	//            {
	//            	if($numrow > 1)
	//            	{
	//                        array_push($data, array
	//                        (
	//                            'IdPegawai' 	  => $row['A'],
	//                            'JenisJadwal'   => $row['B'],
	//                            'JadwalKerja'   => $row['C'],
	//                            'IdWaktuKerja'  => $row['D'],
	//                            'IdPegawaiUpload' => $this->session->userdata('ses_id')
	//                        ));
	//            	}

	//           		$numrow++;
	//            }

	//            $this->db->insert_batch('MasterJadwalKerja', $data);

	//            //delete file from server
	//            unlink(realpath('UploadData/JadwalKerja/Shift/'.$data_upload['file_name']));

	//            //upload success
	//            $this->session->set_flashdata('msg', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
	//            //redirect halaman
	//            redirect('kepegawaian/jadwalkerja/shift');
	//       	}

	// }

	public function SubmitUploadShiftCoba() {
		// LOAD PLUGIN PHP EXCEL
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$TahunGaji=$this->input->post('TahunGaji');
		$BulanGaji=$this->input->post('BulanGaji');
		// $JenisJadwal       = $this->input->post('JenisJadwal');
		$startdate=0;


		if ( !empty($_FILES['userfile']['name'])) {
			$uploaddir="UploadData/JadwalKerja/Shift/";
			$config['upload_path']="$uploaddir";
			$config['allowed_types']='xlsx|xls';
			$config['max_size']='10000';
			// $config['encrypt_name']     = true;

			$this->load->library('upload', $config);

			foreach ($_FILES as $row=> $val) {

				$config['file_name']=url_title($this->input->post($row));
				$this->upload->initialize($config);

				if ( !$this->upload->do_upload($row)) {
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg', 'Sorry Error To Upload');
					print_r($error);
				}

				else {
					$data=array('upload_data'=> $this->upload->data());
					$inputFileName=$uploaddir . $data['upload_data']['file_name'];

					try {

						$inputFileType=PHPExcel_IOFactory::identify($inputFileName);
						$objReader=PHPExcel_IOFactory::createReader($inputFileType);
						$objPHPExcel=$objReader->load($data['upload_data']['full_path']);
					}

					catch (Exception $e) {
						die('Error loading file "'. pathinfo($data['upload_data']['file_name'], PATHINFO_BASENAME) . '": '. $e->getMessage());
					}

					$sheetData=$objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

					foreach ($sheetData as $i=> $v) {
						if ($i > 1) {
							$data=array_filter($v);

							foreach ($v as $key=> $val) {
								$colNumber=PHPExcel_Cell::columnIndexFromString($key);
								$highestColumn=$objPHPExcel->getActiveSheet()->getHighestDataColumn();
								$highestcolNumber=PHPExcel_Cell::columnIndexFromString($highestColumn);


								if ($key !='A'&& !empty($v['A']) && !empty($val)) {
									if ($colNumber > 3) {
										$startdate++;
										$curr=$startdate . "-". $BulanGaji . "-". $TahunGaji;
										$wday=date('Y-m-d', strtotime("$curr"));

										$IdPegawai = $v['A'];
										$JenisJadwal= $v['C'];
										$JadwalKerja = $wday;
										$IdWaktuKerja = $val;
										$IdPegawaiUpload = '201911020822';


										// $data_jadwal_kerja = array
										// (	'IdPegawai'=> $v['A'],
										// 	'JenisJadwal'=> $v['C'],
										// 	'JadwalKerja'=> $wday,
										// 	// 'j_month'       =>$bulan,
										// 	// 'j_year'      =>$tahun,
										// 	'IdWaktuKerja'=> $val,
										// 	// 'j_input'     =>date("Y-m-d H:i:s"),
										// 	'IdPegawaiUpload'=> $this->session->userdata('ses_id')
										// );


										// $this->db->insert('MasterJadwalKerja', $data_jadwal_kerja);
										$this->db->query("EXEC AUDMasterJadwalKerja '$IdPegawai','$JenisJadwal','$JadwalKerja', '$IdWaktuKerja','$IdPegawaiUpload','','A' ");
										//delete file from server
										// unlink($inputFileName);
									}
								}
							}

							$startdate=0;
						}
					}


					unlink($inputFileName);
					redirect('kepegawaian/jadwalkerja/shift', 'refresh');
				}
			}
		}

		else {
			unlink($inputFileName);
			echo "file empty";
			redirect('kepegawaian/jadwalkerja/shift', 'refresh');
		}
	}
}