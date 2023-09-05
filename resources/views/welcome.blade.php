<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>e-book</title>
    <!-- เรียกใช้ CSS ของ Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .tabs {
            display: flex;
            list-style: none;
            padding: 0;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 3px 5px 3px rgba(0, 0, 0, 0.1);

        }

        .tab {
            flex: 1;
            cursor: pointer;
            padding: 10px 0;
            text-align: center;
            border-right: 1px solid #ffffff;
        }

        .tab:last-child {
            border-right: none;
        }

        .tab.active {
            background-color: #172439;
            color: #ffffff;
            /* เปลี่ยนสีที่คุณต้องการ */
            border-bottom: 1px solid #ffffff;
        }

        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid #ffffff;
            border-radius: 0 0 5px 5px;
        }

        .tab-content.active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<!-- Navbar -->
<nav class="p-4 bg-white shadow-md">
    <div class="container flex items-center justify-between mx-auto">
        <div class="text-xl font-bold text-black">E-book</div>
        @if (Route::has('login'))
            <div>
                @auth
                    <div class="relative inline-block text-left">

                        <button type="button"
                        class="inline-flex items-center px-4 py-2 ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        id="userMenuButton" aria-haspopup="true" aria-expanded="true" onclick="toggleDropdown()">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-1 -mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>


                            <div id="userDropdown"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                                role="menu" aria-orientation="vertical" aria-labelledby="userMenuButton" tabindex="-1"
                                style="display: none;">
                                <div class="py-1" role="none">
                                    <x-responsive-nav-link :href="route('profile.edit')" role="menuitem">
                                        {{ __('Profile') }}
                                    </x-responsive-nav-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')" role="menuitem"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </div>
                            </div>




                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-4 py-2 ml-4 font-semibold text-black bg-white border border-gray-800 rounded-full focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Login
                    </a>
                    @if (Route::has('author.login'))
                        <a href="{{ route('author.login') }}"
                            class="inline-block px-4 py-2 ml-4 font-semibold text-white bg-gray-800 border border-gray-800 rounded-full hover:text-gray-800 hover:bg-white focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">publish</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>


<body>
    <main class="py-5 ">
        <div class="text-center text-black bg-gray-50 ">
            <div class="flex items-center justify-center ">
                <img src="https://media.discordapp.net/attachments/786971052101074946/1138533684807479378/1.png"
                    alt="รายละเอียดเพิ่มเติมเกี่ยวกับรูปภาพ" class="shadow-md">
            </div>
        </div>

        <div class="py-5 shadow-md px-60">
            <ul class="bg-white tabs">
                <li class="tab active" data-tab="tab1">นิยาย<br>และวรรณกรรม</li>
                <li class="tab" data-tab="tab2">วิทยาการ<br>และเทคโนโลยี</li>
                <li class="tab" data-tab="tab3">ประวัติศาสตร์<br>และวัฒนธรรม</li>
                <li class="tab" data-tab="tab4">การศึกษา<br>และการเรียนรู้</li>
                <li class="tab" data-tab="tab5">ธุรกิจ<br>และการเงิน</li>
                <li class="tab" data-tab="tab6">สุขภาพ<br>และการดูแลรักษา</li>
            </ul>

            <div class="tab-content active" id="tab1">
                <p>นิยาย และวรรณกรรม</p>
                <div class="flex justify-center items-center">
                    <!-- 5 รูป -->
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                </div>
            </div>


            <div class="tab-content " id="tab2">
                <p>วิทยาการ และเทคโนโลยี</p>
                <div class="flex justify-center items-center">
                    <!-- 5 รูป -->
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                </div>
            </div>


            <div class="tab-content " id="tab3">
                <p>ประวัติศาสตร์ และวัฒนธรรม</p>
                <div class="flex justify-center items-center">
                    <!-- 5 รูป -->
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                </div>
            </div>


            <div class="tab-content " id="tab4">
                <p>การศึกษา และการเรียนรู้</p>
                <div class="flex justify-center items-center">
                    <!-- 5 รูป -->
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                </div>
            </div>


            <div class="tab-content " id="tab5">
                <p>ธุรกิจ และการเงิน</p>
                <div class="flex justify-center items-center">
                    <!-- 5 รูป -->
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                </div>
            </div>


            <div class="tab-content " id="tab6">
                <p>สุขภาพ และการดูแลรักษา</p>
                <div class="flex justify-center items-center">
                    <!-- 5 รูป -->
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                    <div class="w-72 h-96 bg-gray-200 m-2"></div>
                </div>
            </div>
        </div>

        <div class="py-5 shadow-md px-60">
            <p class="text-center text-2xl">หนังสือใหม่</p>
            <div class="flex justify-center items-center">
                <!-- แถวที่ 1 -->
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
            </div>
        </div>
        <div class="py-5 shadow-md px-60">
            <p class="text-center text-2xl">หนังสือยอดฮิต</p>
            <div class="flex justify-center items-center">
                <!-- แถวที่ 1 -->
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
                <div class="w-72 h-96 bg-gray-200 m-2"></div>
            </div>
        </div>
        <div class="py-5 shadow-md px-60">
            <p class="text-center text-2xl">หนังสือยอดฮิต</p>
            <div class="flex flex-row space-y-4">
                <!-- ตารางประจำสัปดาห์ -->
                <div class="flex flex-row">
                    <div>
                        <h2 class="text-xl font-semibold">ประจำสัปดาห์</h2>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ลำดับ</th>
                                    <th class="px-4 py-2">หนังสือ</th>
                                    <th class="px-4 py-2">ยอดคนอ่าน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2">1</td>
                                    <td class="px-4 py-2">หนังสือ 1</td>
                                    <td class="px-4 py-2">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2">2</td>
                                    <td class="px-4 py-2">หนังสือ 2</td>
                                    <td class="px-4 py-2">950</td>
                                </tr>
                                <!-- เพิ่มข้อมูลอื่น ๆ ในรายชื่อหนังสือฮิตประจำสัปดาห์ -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ตารางประจำเดือน -->
                <div class="flex flex-row">
                    <div>
                        <h2 class="text-xl font-semibold">ประจำเดือน</h2>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ลำดับ</th>
                                    <th class="px-4 py-2">หนังสือ</th>
                                    <th class="px-4 py-2">ยอดคนอ่าน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2">1</td>
                                    <td class="px-4 py-2">หนังสือ A</td>
                                    <td class="px-4 py-2">1200</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2">2</td>
                                    <td class="px-4 py-2">หนังสือ B</td>
                                    <td class="px-4 py-2">1100</td>
                                </tr>
                                <!-- เพิ่มข้อมูลอื่น ๆ ในรายชื่อหนังสือฮิตประจำเดือน -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </main>
    <!-- เนื้อหาหน้าเว็บ -->
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('userDropdown');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }

        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                const tabContent = document.getElementById(tabId);
                tabContent.classList.add('active');
            });
        });
    </script>
</body>

</html>
<!-- from node_modules -->
