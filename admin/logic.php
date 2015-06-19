<?php 
	include '../koneksi.php';
	session_start();
	$msg="";
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='del')
	{
		$get_id=$_REQUEST['del_id'];
		$del="DELETE FROM dosen WHERE iddosen='$get_id'";
		mysql_query($del) or mysql_error();
		echo "<script>alert('Akun Berhasil dihapus');
				window.location='index.php';
			</script>";
	}
	if(isset($_POST['keyword']) && $_POST['SEARCH']=='Search')
	{
			$keyword=trim($_POST['keyword']);
			$src .= " WHERE fname like '$keyword%'";
	}
	if(isset($_REQUEST['id']) && $_REQUEST['act']=='st')
	{
		$id=$_REQUEST['id'];
		$sel_user="SELECT * FROM dosen WHERE iddosen='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);
		if($fet['status']=='Aktif')
		{
			$upd="UPDATE dosen SET status='Tidak Aktif' WHERE iddosen='$id'";
			$updr=mysql_query($upd);
			echo "<script>alert('Akun Berhasil Dinonaktifkan');
				window.location='index.php';
			</script>";			
		}
		else
		{
			$upd="UPDATE dosen SET status='Aktif' WHERE iddosen='$id'";
			$updr=mysql_query($upd);
		echo "<script>alert('Akun Berhasil diaktifkan');
				window.location='index.php';
			</script>";
			
		}
	}
?>
