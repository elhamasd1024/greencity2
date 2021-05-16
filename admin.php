<?php
include 'Resources/Php/ifLogedIn.php';
include 'header.php';
if (!$_SESSION['admin']) header('Location: index.php');
?>
<!-- component -->
<div class="flex min-h-screen">
    <nav class="w-56 flex-shrink-0">
        <div class="flex-auto bg-green-800 h-full">
            <div class="flex flex-col overflow-y-auto">
                <ul class="relative m-0 p-0 list-none h-full">
                    <li class="text-white text-2xl p-4 w-full flex relative shadow-sm justify-start bg-green-800 border-b-2 border-green-700">
                        Admin Panel
                    </li>
                    <a href="admin.php?userManagement" class=" cursor-pointer">
                    <div class="<?php if (isset($_GET['userManagement'])) echo 'text-blue-400'; else echo 'text-gray-400'; ?> flex relative px-4 hover:bg-gray-700">
                        <div class="mr-4 my-auto">
                            <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path></svg>
                        </div>
                        <div class="flex-auto my-1">
                            User Management
                        </div>
                    </div>
                    </a>
                    <a href="admin.php?approval" class=" cursor-pointer">
                    <div class="<?php if (isset($_GET['approval'])) echo 'text-blue-400'; else echo 'text-gray-400'; ?> flex relative px-4 hover:bg-gray-700">
                        <div class="mr-4 my-auto">
                            <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 13H5c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zM7 19c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zM19 3H5c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM7 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"></path></svg>
                        </div>
                        <div class="flex-auto my-1">
                            Approval panel
                        </div>
                    </div>
        </a>
                    <a href="admin.php?stationsManagement" class=" cursor-pointer">
                    <div class="<?php if (isset($_GET['stationsManagement'])) echo 'text-blue-400'; else echo 'text-gray-400'; ?> flex relative px-4 hover:bg-gray-700">
                        <div class="mr-4 my-auto">
                            <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 3H3C2 3 1 4 1 5v14c0 1.1.9 2 2 2h18c1 0 2-1 2-2V5c0-1-1-2-2-2zM5 17l3.5-4.5 2.5 3.01L14.5 11l4.5 6H5z"></path></svg>            </div>
                        <div class="flex-auto my-1">
                            Stations
                        </div>
                    </div>
        </a>
                    <a href="admin.php?cityManagement" class=" cursor-pointer">
                    <div class="<?php if (isset($_GET['cityManagement'])) echo 'text-blue-400'; else echo 'text-gray-400'; ?> flex relative px-4 hover:bg-gray-700">
                        <div class="mr-4 my-auto">
                            <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"></path></svg>            </div>
                        <div class="flex-auto my-1">
                            Cities & Areas
                        </div>
                    </div>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex flex-col w-full">
<!--         <div class="text-white bg-blue-400 flex w-full">-->
<!--            <div class="flex overflow-hidden h-12 ml-2">-->
<!--                <button class="mx-3 border-b-2 border-white">-->
<!--                    <span>Users</span>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->

        <?php
        if (isset($_GET['userManagement'])){
            echo '
        <div class="flex mt-5 flex-col">
            ';
                 include 'Resources/Php/userManagement.php';

            echo '
        </div>
                ';
        }
        ?>

        <?php
        if (isset($_GET['stationsManagement'])){
            echo '
        <div class="flex mt-5 flex-col">
            ';
            include 'Resources/Php/stationsManagement.php';

            echo '
        </div>
                ';
        }
        ?>

        <?php
        if (isset($_GET['approval'])){
            echo '
        <div class="flex mt-5 flex-col">
            ';
            include 'Resources/Php/approvalPanel.php';

            echo '
        </div>
                ';
        }
        ?>

        <?php
        if (isset($_GET['cityManagement'])){
            echo '
        <div class="flex mt-5 flex-col">
            ';
            include 'Resources/Php/cityManagement.php';

            echo '
        </div>
                ';
        }
        ?>

        <?php
        if (isset($_GET['editCity'])){
            echo '
        <div class="flex mt-5 flex-col">
            ';
            include 'Resources/Php/editCity.php';

            echo '
        </div>
                ';
        }
        ?>


    </div>
</div>
<?php
include 'footer.php';
?>


