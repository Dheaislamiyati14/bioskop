<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
   <title>login</title>
</head>
<body class="bg-gradient-to-r from-pink-500 to-yellow-500">
   
   <div class="flex flex-row justify-center h-full">
      
      <div class="my-auto bg-white rounded-xl text-lg ">
         <form action="login.php" method="post" class="flex flex-col m-12 ">
            <div class="flex flex-col my-2">
               <label class="my-2 text-pink-500 font-mono">Akun</label>
               <input class="border border-slate-500 rounded" type="text" name="username">
            </div >
            <div class="flex flex-col ">
               <label class="my-2 text-pink-500 font-mono">Kata Sandi</label>
               <input class="border border-slate-500 rounded" type="password" name="password">
            </div>

            <button class="bg-pink-500 rounded-xl mt-6 text-center ">
               <input type="submit" value="masuk" class="text-white cursor-pointer font-mono">
            </button>
   
         </form>   
      </div>

   </div>
</body>
</html>