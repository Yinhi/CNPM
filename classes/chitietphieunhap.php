<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class chitietphieunhap
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm chi tiết phiếu nhập
		public function themChiTietPhieuNhap($data){
			$MPN = mysqli_real_escape_string($this->db->link, $data['MPN']);
			$MCTSP = mysqli_real_escape_string($this->db->link, $data['MCTSP']);
			$GIA_NHAP = mysqli_real_escape_string($this->db->link, $data['GIA_NHAP']);
			$SO_LUONG = mysqli_real_escape_string($this->db->link, $data['SO_LUONG']);
			$THANH_TIEN = mysqli_real_escape_string($this->db->link, $data['THANH_TIEN']);

			if($MPN=="" || $MCTSP=="" || $GIA_NHAP=="" || $SO_LUONG=="" || $THANH_TIEN==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO chi_tiet_phieu_nhap(MPN,MCTSP,GIA_NHAP,SO_LUONG,THANH_TIEN) 
							  VALUES('$MPN','$MCTSP','$GIA_NHAP','$SO_LUONG','$THANH_TIEN')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm chi tiết phiếu nhập thành công ";
						return $alert;
					}else{
						$alert = "Thêm chi tiết phiếu nhập không thành công ";
						return $alert;
					}				
			}
				
        //Cập nhật phiếu nhập
		public function suaChiTietPhieuNhap($data,$MPN,$MCTSP){
			$MPN = mysqli_real_escape_string($this->db->link, $data['MPN']);
			$MCTSP = mysqli_real_escape_string($this->db->link, $data['MCTSP']);
			$GIA_NHAP = mysqli_real_escape_string($this->db->link, $data['GIA_NHAP']);
			$SO_LUONG = mysqli_real_escape_string($this->db->link, $data['SO_LUONG']);
			$THANH_TIEN = mysqli_real_escape_string($this->db->link, $data['THANH_TIEN']);

			if($MPN=="" || $MCTSP=="" || $GIA_NHAP=="" || $SO_LUONG=="" || $THANH_TIEN==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "UPDATE chi_tiet_phieu_nhap SET

                    MPN = '$MPN',
					MCTSP = '$MCTSP',
					GIA_NHAP = '$GIA_NHAP', 
					SO_LUONG = '$SO_LUONG', 
					THANH_TIEN = '$THANH_TIEN'
			
					WHERE MPN = '$MPN' and MCTSP = '$MCTSP'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật chi tiết phiếu nhập thành công ";
						return $alert;
					}else{
						$alert = "Cập nhật chi tiết phiếu nhập không thành công ";
						return $alert;
					}				
			}
	
        //Xóa phiếu nhập
		public function xoaChiTietPhieuNhap($MPN,$MCTSP){
			$query = "DELETE FROM chi_tiet_phieu_nhap where MPN = '$MPN' and MCTSP = '$MCTSP'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa chi tiết phiếu nhập thành công ";
				return $alert;
			}else{
				$alert = "Xóa chi tiết phiếu nhập không thành công ";
				return $alert;
			}
			
		}
		
        //Lấy tất cả chi tiết phiếu nhập
		public function getAll(){
			$query = "SELECT * FROM chi_tiet_phieu_nhap";
			$result = $this->db->select($query);
			return $result;
		}
	}	 
?>