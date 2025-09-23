<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  

  <script src="https://cdn.tailwindcss.com"></script>
  

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
</head>
<body class="bg-gray-50 text-slate-700">
  <x-app-layout>
    <div class="container max-w-5xl py-12">
      

      <div class="bg-white rounded-3xl shadow-sm p-8 text-center mb-10">
        <h1 class="fw-bold text-3xl md:text-4xl mb-2 text-slate-800">
          <i class="fas fa-tachometer-alt me-2 text-indigo-600"></i>
          Admin Dashboard
        </h1>
        <p class="text-slate-500 text-lg">Administrative control panel</p>
      </div>

     
      <div class="bg-white rounded-3xl shadow-sm p-10 text-center mb-10">
        <div class="text-5xl text-indigo-600 mb-4">
          <i class="fas fa-shield-alt"></i>
        </div>
        <h2 class="fw-semibold text-xl text-slate-800 mb-3">{{ __("Admin logged in!") }}</h2>
        <p class="text-slate-500 mb-6">
          You have full administrative privileges to manage the platform.
        </p>

       
        <div class="flex flex-wrap justify-center gap-4">
          <a href="{{route('post.management')}}" 
             class="inline-flex items-center gap-2 bg-indigo-600 text-white fw-semibold px-5 py-3 rounded-full 
                    hover:bg-indigo-700 shadow-sm transition transform hover:-translate-y-1">
            <i class="bi bi-archive-fill"></i> Posts Management
          </a>
          <a href="{{route('user.management')}}" 
             class="inline-flex items-center gap-2 bg-indigo-600 text-white fw-semibold px-5 py-3 rounded-full 
                    hover:bg-indigo-700 shadow-sm transition transform hover:-translate-y-1">
            <i class="bi bi-person-fill-gear"></i> Users Management
          </a>
        </div>
      </div>
    </div>
  </x-app-layout>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
