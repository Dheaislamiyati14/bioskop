<?php
   include_once("config.php");

   if(isset($_POST['update'])) {
      
      $id = $_POST['id'];

      $nama = $_POST['nama'];
      $judul = $_POST['judul'];
      $jam = $_POST['jam'];
      $jumlah_tiket = $_POST['jumlah_tiket'];
      $no_kursi = $_POST['no_kursi'];
      $no_telp = $_POST['no_telp'];

      $result = mysqli_query($mysqli, "UPDATE pelanggan SET nama='$nama', judul='$judul', jam='$jam', jumlah_tiket='$jumlah_tiket', no_kursi='$no_kursi', no_telp='$no_telp' WHERE id=$id");

      header("Location: index.php");
   }
?>

<?php
   $id = $_GET['id'];

   $result = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id=$id");

   while($user_data = mysqli_fetch_array($result)) {

      $nama = $user_data['nama'];
      $judul = $user_data['judul'];
      $jam = $user_data['jam'];
      $jumlah_tiket = $user_data['jumlah_tiket'];
      $no_kursi = $user_data['no_kursi'];
      $no_telp = $user_data['no_telp'];
   }

?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>edit user</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
   
   <nav class="flex flex-col bg-white drop-shadow-md w-full fixed">
      <div class="flex justify-start my-4">
         <a href="index.php" class="ml-4">Kembali</a>
      </div>
   </nav>

   <section class="flex flex-col justify-center h-screen">
      
      <form action="edit.php" method="POST" name="daftar" class="flex flex-col m-8 ">
         <h1 class="flex text-2xl font-bold font-mono justify-center my-2 text-pink-500">Registrasi Pengunjung</h1>
         <header class="flex flex-col">
            <label class="text-lg font-bold text-pink-500">Nama</label>
            <input type="text" name="nama" value="<?php echo $nama; ?>"
            class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500 " required>
         </header>
         
         <header class="flex flex-col">
            <label class="text-lg font-bold text-pink-500 pt-4 ">Judul</label>
            <input type="text" name="judul" placeholder="" value="<?php echo $judul; ?>"
            class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500" required>
         </header>

         <header class="flex flex-col">
            <label class="text-lg font-bold text-pink-500 pt-4">Jam</label>
            <input type="time" name="jam" placeholder="" value="<?php echo $jam; ?>"
            class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500" >
         </header>

         <header class="flex flex-col">
            <label class="text-lg font-bold text-pink-500 pt-4">Jumlah tiket</label>
            <input type="number" name="jumlah_tiket" placeholder="2 tiket"  value="<?php echo $jumlah_tiket; ?>"
            class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500" min="1" required>
         </header>

         <header class="flex flex-col">
            <label class="text-lg font-bold text-pink-500 pt-4">Nomor Kursi</label>
            <input type="text" name="no_kursi" placeholder="1A" value="<?php echo $no_kursi; ?>"
            class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500">
         </header>
         
         <header class="flex flex-col">
            <label class="text-lg font-bold text-pink-500 pt-4">Nomor telpon</label>
            <input type="text" name="no_telp" placeholder="08xx-xxxx-xxxx" value="<?php echo $no_telp; ?>"
            class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500">
         </header>

         <button class="flex flex-col mt-4 cursor-pointer ">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="update" value="Ubah" class="flex bg-pink-500 cursor-pointer w-full hover:bg-pink-700 text-white p-2 rounded-full justify-center">
         </button>
      </form>
   </section>

   
</body>
</html>