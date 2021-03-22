<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

	function accounts()
	{
		$accounts = $this->db->get('accounts');
		if ($accounts->num_rows() > 0) {
			return $accounts->num_rows();
		} else {
			return 0;
		}
	}

	function interiors()
	{
		$interiors = $this->db->get('interiors');
		if ($interiors->num_rows() > 0) {
			return $interiors->num_rows();
		} else {
			return 0;
		}
	}

	function bankmoney()
	{
		$this->db->select('SUM(bankmoney) as bankmoney');
		$this->db->from('characters');
		$query = $this->db->get();

		return $query->result();
	}

	function donhis()
	{
		$donhis = $this->db->get('don_purchases');
		if ($donhis->num_rows() > 0) {
			return $donhis->num_rows();
		} else {
			return 0;
		}
	}

	function get_all_donhistory()
	{
		$this->datatables->select('don_purchases.id AS id, don_purchases.name AS name, don_purchases.cost AS cost, don_purchases.date AS date, accounts.username AS account');
		$this->datatables->from('don_purchases');
		$this->datatables->join('accounts', 'account=accounts.id', 'inner');
		return $this->datatables->generate();
	}
}
