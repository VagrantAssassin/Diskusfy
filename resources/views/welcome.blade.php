<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diskusfy</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/hoverA.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>

  <div class="flex flex-col">
    <nav class="dark:bg-gray-800 border-gray-200 dark:bg-gray-800">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto px-4 py-2">
        <div class="flex items-center relative">
          <div class="relative">
            <input type="text" id="search-navbar"
              class="block w-64 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Search...">
          </div>
          <button type="button"
            class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 ml-2 dark:bg-green-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </div>
    </nav>
    <div class="w-full">
      <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
          <a href="#" onclick="location.reload(); return false;" class="flex items-center ps-2.5 mb-5">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Diskusfy</span>
          </a>
          <ul class="space-y-2 font-medium">
            <li>
              <a href="/"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg
                  class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path
                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                  <path
                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                </svg>
                <span class="ms-3">Dashboard</span>
              </a>
            </li>
            <li x-data="{ open: false }">
              <button @click="open = !open"
                class="flex items-center justify-start p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group w-full">
                <svg
                  class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M4 3C4 2.44772 4.44772 2 5 2H15C15.5523 2 16 2.44772 16 3V7C16 7.55228 15.5523 8 15 8H5C4.44772 8 4 7.55228 4 7V3Z" />
                  <path
                    d="M4 10C4 9.44772 4.44772 9 5 9H15C15.5523 9 16 9.44772 16 10V14C16 14.5523 15.5523 15 15 15H5C4.44772 15 4 14.5523 4 14V10Z" />
                  <path
                    d="M4 17C4 16.4477 4.44772 16 5 16H15C15.5523 16 16 16.4477 16 17V18C16 18.5523 15.5523 19 15 19H5C4.44772 19 4 18.5523 4 18V17Z" />
                </svg>
                <span class="ms-3 whitespace-nowrap">Kategori</span>
                <svg class="w-4 h-4 ml-auto text-gray-500 dark:text-gray-400 transform transition-transform"
                  :class="open ? 'rotate-180' : 'rotate-0'" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M6 9l6 6 6-6"></path>
                </svg>
              </button>

              <!-- Dropdown menu -->
              <ul x-show="open" @click.away="open = false"
                class="ml-6 mt-2 space-y-2 bg-gray-100 dark:bg-gray-700 rounded-lg p-2">
                <li><a id="indoBtn"
                    class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded dark:text-white">Indonesia</a>
                </li>
                <li><a id="mtkBtn"
                    class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded dark:text-white">Matematika</a>
                </li>
                <li><a id="codingBtn"
                    class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded dark:text-white">Coding</a>
                </li>
                <li><a id="hukumBtn"
                    class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded dark:text-white">Hukum</a>
                </li>
                <li><a id="algoBtn"
                    class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded dark:text-white">Algoritma</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="/new_discussion"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg
                  class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M16.707 3.293a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414l9-9a1 1 0 0 1 1.414 0zM12 6a2 2 0 1 0 4 0 2 2 0 0 0-4 0zm-2 2a2 2 0 1 0-4 0 2 2 0 0 0 4 0zm8 10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10z" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Diskusi Baru</span>
              </a>
            </li>
            <li>
              <a href="/edit_profile"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg
                  class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path
                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
              </a>
            </li>
            <li>
              <a href="#" id="logoutButton"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg
                  class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
              </a>
            </li>

          </ul>
        </div>
        <nav class="dark:bg-gray-800 border-gray-200 dark:bg-gray-800">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="flex md:order-2">
              <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                aria-expanded="false"
                class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
              </button>
              <div class="relative hidden md:block">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                  <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar"
                  class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Search...">
              </div>
              <button data-collapse-toggle="navbar-search" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
                </svg>
              </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
              <div class="relative mt-3 md:hidden">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                </div>
                <input type="text" id="search-navbar"
                  class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Search...">
              </div>
              <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                  <a href="#"
                    class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                    aria-current="page">Home</a>
                </li>
                <li>
                  <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                  <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </aside>

      <div class="flex-1 pl-64">
        <main class="min-h-screen" id="mainContent">
          @include('home.home') <!-- Mengarahkan ke home -->
        </main>
      </div>


    </div>
  </div>

  <button id="chatbotButton"
    class="fixed bottom-5 right-5 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-600 transition">
    💬
  </button>

  <div id="chatbotPopup" class="hidden fixed bottom-16 right-5 w-80 h-96 bg-white shadow-lg rounded-lg flex flex-col">
    <div class="flex justify-between items-center bg-blue-500 text-white p-3 rounded-t-lg">
      <span>Chatbot AI</span>
      <button id="closeChatbot" class="text-white">&times;</button>
    </div>
    <div id="chatbox" class="flex-1 p-3 overflow-y-auto max-h-64"></div>
    <div class="p-3 border-t flex">
      <input id="chatInput" type="text" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-200"
        placeholder="Tulis pesan...">
      <button id="sendChat" class="bg-blue-500 text-white px-3 ml-2 rounded-lg hover:bg-blue-600 transition">📤</button>
    </div>
  </div>






  {{-- <main class="content" id="mainContent">
    @include('home.home')
  </main> --}}
  <script defer src="{{ asset('js/ctg_btn/indoBtn.js') }}"></script>
  <script defer src="{{ asset('js/ctg_btn/mtkBtn.js') }}"></script>
  <script defer src="{{ asset('js/ctg_btn/codingBtn.js') }}"></script>
  <script defer src="{{ asset('js/ctg_btn/hukumBtn.js') }}"></script>
  <script defer src="{{ asset('js/ctg_btn/algoBtn.js') }}"></script>
  <script defer src="{{ asset('js/chatbot.js') }}"></script>
  <script defer src="{{ asset('js/newDiscussionButton.js') }}"></script>
  <script defer src="{{ asset('js/commentButton.js') }}"></script>
  <script type="module" src="{{ asset('js/auth.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</body>

</html>