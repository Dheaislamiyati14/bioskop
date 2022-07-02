<?php
   include_once("config.php");

   $results = mysqli_query($mysqli, "SELECT * FROM pelanggan ORDER BY id ASC");

?>

<?php
   session_start();
   if ($_SESSION['status'] != "login") {
      header("location:index.php?pesan=belum_login");
   }
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bioskop</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-pink-500 to-yellow-500">

   <a href="logout.php" class="text-white text-lg m-4">keluar</a>
   
   <section class="flex flex-row justify-around">
      
      <!-- buat form pendaftaran -->
      <main class="flex flex-col bg-white drop-shadow-xl m-4 w-1/4 rounded-xl">

         <form action="index.php" method="POST" name="daftar" class="flex flex-col m-8 ">
            <h1 class="flex text-2xl font-bold font-mono justify-center my-2 text-pink-500">Registrasi Pengunjung</h1>
            <header class="flex flex-col">
               <label class="text-lg font-bold text-pink-500">Nama</label>
               <input type="text" name="nama" 
               class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500 " required>
            </header>

            <header class="flex flex-col">
               <label class="text-lg font-bold text-pink-500 pt-4 ">Judul</label>
               <input type="text" name="judul" placeholder="" 
               class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500" required>
            </header>

            <header class="flex flex-col">
               <label class="text-lg font-bold text-pink-500 pt-4">Jam</label>
               <input type="time" name="jam" placeholder="" value="15:00"
               class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500" >
            </header>

            <header class="flex flex-col">
               <label class="text-lg font-bold text-pink-500 pt-4">Jumlah tiket</label>
               <input type="number" name="jumlah_tiket" placeholder="2 tiket" 
               class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500" min="1" required>
            </header>

            <header class="flex flex-col">
               <label class="text-lg font-bold text-pink-500 pt-4">Nomor Kursi</label>
               <input type="text" name="no_kursi" placeholder="1A" 
               class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500">
            </header>

            <header class="flex flex-col">
               <label class="text-lg font-bold text-pink-500 pt-4">Nomor telpon</label>
               <input type="text" name="no_telp" placeholder="08xx-xxxx-xxxx" 
               class="border p-2 rounded border-slate-300 focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500">
            </header>

            <button class="flex flex-col mt-4 cursor-pointer ">
               <input type="submit" name="submit" value="Pesan kursi" class="flex bg-pink-500 cursor-pointer w-full hover:bg-pink-700 text-white p-2 rounded-xl justify-center">
            </button>


            <?php
               if (isset($_POST['submit'])) {
                  $nama = $_POST['nama'];
                  $judul = $_POST['judul'];
                  $jam = $_POST['jam'];
                  $jumlah_tiket = $_POST['jumlah_tiket'];
                  $no_kursi = $_POST['no_kursi'];
                  $no_telp = $_POST['no_telp'];

                  include_once("config.php");
                  
                  $res = mysqli_query($mysqli, "INSERT INTO pelanggan (nama, judul, jam, jumlah_tiket, no_kursi, no_telp) VALUES ('$nama', '$judul', '$jam', '$jumlah_tiket', '$no_kursi', '$no_telp')");

                  if ($res) {
                     echo "<meta http-equiv='refresh' content='0'>";
                     echo "Berhasil";

                  } else {
                     echo "Gagal";
                  }
               }
            ?>

         </form>
      </main>

      <!-- buat list pendaftaran -->
      <main class="flex flex-col m-4 bg-white drop-shadow-2xl w-3/4 rounded-xl">

         <section class="m-4">
            <h1 class="text-3xl font-bold font-mono text-center text-pink-500">Daftar Pengunjung</h1>
            <table class="flex justify-center font-mono">
               <tr>
                  <th class="text-left p-4 text-pink-500">No</th>
                  <th class="text-left p-4 text-pink-500">Nama Pemesan</th>
                  <th class="text-left p-4 text-pink-500">Judul Film</th>
                  <th class="text-left p-4 text-pink-500">Jam Tayang</th>
                  <th class="text-left p-4 text-pink-500">Orang</th>
                  <th class="text-left p-4 text-pink-500">Nomor kursi</th>
                  <th class="text-left p-4 text-pink-500">No. Telp</th>
                  <th class="text-left p-4 text-pink-500">edit</th>
               </tr>
               <?php while ($row = mysqli_fetch_array($results)) {
                  echo "<tr class=''>";
                  echo "<td class='p-4 text-orange-400'>".$row['id']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>".$row['nama']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>".$row['judul']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>".$row['jam']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>".$row['jumlah_tiket']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>".$row['no_kursi']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>".$row['no_telp']."</td>";
                  echo "<td class='p-2 pl-4 border-y-2 text-orange-500 border-orange-500/25'>" . "<a href='edit.php?id=$row[id]' class='font-bold'>Ubah</a> || <a href='delete.php?id=$row[id]' class='font-bold'>Hapus</a>" . "</td>";
                  echo "</tr>";
                  }
               ?>
            </table>
         </section>
      </main>
   </section>
</body>
</html>