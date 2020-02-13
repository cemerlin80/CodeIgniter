<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function liste()
	{
        $requete = $this->db->query("select * from disc natural join artist");

        $data["liste"] = $requete->result();

		$this->loadPage("liste", $data);
    }
    
    public function detail($id)
	{
        $requete = $this->db->query("select * from disc natural join artist where disc_id=?", array($id)); // Affiche détail avec l'id en url

        $data["detail"] = $requete->row();

		$this->loadPage("detail", $data);
        
	}

    public function add()
	{
		if ($this->input->post() && $this->checkForm()) {
			$this->insertDisc();
	
			redirect(site_url("discs/liste"));
		}
		else {
			$data["artists"] = $this->db->query("select * from artist")->result();
			$data["url"] = "discs/add";
			$data["submitValue"] = "Ajouter";

			$this->loadPage("add_edit", $data);
        }
        
	}
	
	public function modifier($id)
	{
		if ($this->input->post() && $this->checkForm()) {
			
			$this->updateDisc($id);
			
			redirect(site_url("discs/liste"));
		}
		else {
			$data["artists"] = $this->db->query("select * from artist")->result();
			$data["disc"] = $this->db->query("select * from disc where disc_id=?", array($id))->row();
			$data["url"] = "discs/modifier/".$id;
			$data["submitValue"] = "Modifier";
			
			$this->loadPage("add_edit", $data);
		}
	}

	public function supprimer($id) 
	{
	
		$this->db->where('disc_id', $id);
		$this->db->delete("disc");
		redirect(site_url("discs/liste"));

	} 
    
	protected function checkForm()
	{
		$this->load->library('form_validation');
	  
		$this->form_validation->set_rules('disc_title', 'titre du disque', 'required');
        $this->form_validation->set_rules('disc_year', 'année du disque', 'required|integer' );
        $this->form_validation->set_rules('disc_label', 'label du disque', 'required');
        $this->form_validation->set_rules('disc_genre', 'genre du disque', 'required');
        $this->form_validation->set_rules('disc_price', 'prix', 'required|numeric');
		$this->form_validation->set_rules('artist_id', 'Nom de l\'artist', 'required|integer');
		
		return $this->form_validation->run();
	}

	protected function getPicture() {
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']           = TRUE;
		
		$this->load->library('upload', $config);

		return $this->upload->do_upload('disc_picture');
	}

	protected function updateDiscDB(array $disc, int $id) {
		$this->db->where('disc_id', $id);
		$this->db->update("disc", $disc);
	}

	protected function insertOrUpdateDisc(bool $isInserting, int $id=null) {
		
		$disc = $this->input->post();

		$this->db->trans_start();
		if ($isInserting){
			$this->db->insert("disc", $disc);
			$id = $this->db->insert_id();
		}
		elseif ($id != null) {
			$this->updateDiscDB($disc, $id);
		}
		else {
			// error
		}
		$this->db->trans_complete();

		if ($this->getPicture()) {
			$res = $this->upload->data();

			$fileName = "upload_". $id . $res["file_ext"];

			rename ($res["full_path"], $res["file_path"].$fileName);

			$disc["disc_picture"] = $fileName;

			$this->updateDiscDB($disc, (int)$id);
		}
	}

	protected function insertDisc(){
		$this->insertOrUpdateDisc(true);
	}

	protected function updateDisc(int $id){
		$this->insertOrUpdateDisc(false, $id);
	}

	protected function loadPage(string $pageName, array $data){
		$this->load->view("discs/header");
		$this->load->view("discs/".$pageName,$data);
		$this->load->view("discs/footer");
	}


   
}



