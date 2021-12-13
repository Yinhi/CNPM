<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class nhanvien
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm nhân viên
		public function themNhanVien($data){
			$MNV = mysqli_real_escape_string($this->db->link, $data['MNV']);
			$TEN = mysqli_real_escape_string($this->db->link, $data['TEN']);
            $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
            $MAT_KHAU = mysqli_real_escape_string($this->db->link, $data['MAT_KHAU']);
            $NGAY_SINH = mysqli_real_escape_string($this->db->link, $data['NGAY_SINH']);
            $GIOI_TINH = mysqli_real_escape_string($this->db->link, $data['GIOI_TINH']);
            $DIA_CHI = mysqli_real_escape_string($this->db->link, $data['DIA_CHI']);
            $CCCD = mysqli_real_escape_string($this->db->link, $data['CCCD']);
            $EMAIL = mysqli_real_escape_string($this->db->link, $data['EMAIL']);
            $CHUC_VU = mysqli_real_escape_string($this->db->link, $data['CHUC_VU']);
            			
			if($MNV=="" || $TEN=="" || $SDT=="" || $MAT_KHAU=="" || $NGAY_SINH=="" || $GIOI_TINH=="" || $DIA_CHI=="" || $CCCD=="" || $EMAIL=="" || $CHUC_VU==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO nhan_vien(MNV,TEN,SDT,MAT_KHAU,NGAY_SINH,GIOI_TINH,DIA_CHI,CCCD,EMAIL,CHUC_VU) 
							  VALUES('$MNV','$TEN','$SDT','$MAT_KHAU','$NGAY_SINH','$GIOI_TINH','$DIA_CHI','$CCCD','$EMAIL','$CHUC_VU')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm nhân viên thành công ";
						return $alert;
					}else{
						$alert = "Thêm nhân viên không thành công ";
						return $alert;
					}				
			}
		
        //Cập nhật nhân viên
		public function suaNhanVien($data,$MNV){
			$MNV = mysqli_real_escape_string($this->db->link, $data['MNV']);
			$TEN = mysqli_real_escape_string($this->db->link, $data['TEN']);
            $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
            $MAT_KHAU = mysqli_real_escape_string($this->db->link, $data['MAT_KHAU']);
            $NGAY_SINH = mysqli_real_escape_string($this->db->link, $data['NGAY_SINH']);
            $GIOI_TINH = mysqli_real_escape_string($this->db->link, $data['GIOI_TINH']);
            $DIA_CHI = mysqli_real_escape_string($this->db->link, $data['DIA_CHI']);
            $CCCD = mysqli_real_escape_string($this->db->link, $data['CCCD']);
            $EMAIL = mysqli_real_escape_string($this->db->link, $data['EMAIL']);
            $CHUC_VU = mysqli_real_escape_string($this->db->link, $data['CHUC_VU']);
            			
			if($MNV=="" || $TEN=="" || $SDT=="" || $MAT_KHAU=="" || $NGAY_SINH=="" || $GIOI_TINH=="" || $DIA_CHI=="" || $CCCD=="" || $EMAIL=="" || $CHUC_VU==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "UPDATE nhan_vien SET

                    MNV = '$MNV',
					TEN = '$TEN',
                    SDT = '$SDT',
                    MAT_KHAU = '$MAT_KHAU',
                    NGAY_SINH = '$NGAY_SINH',
                    GIOI_TINH = '$GIOI_TINH',
                    DIA_CHI = '$DIA_CHI',
                    CCCD = '$CCCD',
                    EMAIL = '$EMAIL',
                    CHUC_VU = '$CHUC_VU'
					
					WHERE MNV = '$MNV'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật nhân viên thành công ";
						return $alert;
					}else{
						$alert = "Cập nhật nhân viên không thành công ";
						return $alert;
					}				
			}
		
        //Xóa nhân viên 
		public function xoaNhanVien($MNV){
			$query = "DELETE FROM nhan_vien where MNV = '$MNV'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa nhân viên thành công ";
				return $alert;
			}else{
				$alert = "Xóa nhân viên không thành công ";
				return $alert;
			}
			
		}

        //Lấy nhân viên theo mã nhân viên
		public function getByMNV($MNV){
			$query = "SELECT * FROM nhan_vien where MNV = '$MNV'";
			$result = $this->db->select($query);
			return $result;
		}
		
        //Lấy tất cả nhân viên
		public function getAll(){
			$query = "SELECT * FROM nhan_vien";
			$result = $this->db->select($query);
			return $result;
		} 
	}
?>