<?php
include 'Resources/Php/ifLogedIn.php';
include 'Resources/Php/addStation.php';
include 'header.php';
?>

<style>
    .-z-1 {
        z-index: -1;
    }

    .origin-0 {
        transform-origin: 0%;
    }

    input:focus ~ label,
    input:not(:placeholder-shown) ~ label,
    textarea:focus ~ label,
    textarea:not(:placeholder-shown) ~ label,
    select:focus ~ label,
    select:not([value='']):valid ~ label {
        /* @apply transform; scale-75; -translate-y-6; */
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
        skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        --tw-scale-x: 0.75;
        --tw-scale-y: 0.75;
        --tw-translate-y: -1.5rem;
    }

    input:focus ~ label,
    select:focus ~ label {
        /* @apply text-black; left-0; */
        --tw-text-opacity: 1;
        color: rgba(0, 0, 0, var(--tw-text-opacity));
        left: 0px;
    }
</style>

    <div class="mt-3 mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
        <?php
        if ($error){
            echo '
        <div class="relative z-0 w-full mb-5 text-red-600">
        '.$error.'
        </div>
    ';
        }
        ?>
        <h1 class="text-2xl font-bold mb-8">Add New Station</h1>
        <form  action="add-station.php" method="post" name="addStation" >
            <div class="relative z-0 w-full mb-5">
                <select
                    name="city"
                    id="city"
                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                >
                    <option value="" ></option>
                    <?php
                    while ($city = mysqli_fetch_assoc($cities)){
                        echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
                    }
                    ?>
                </select>
                <label for="city" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select City</label>
            </div>

            <div class="relative z-0 w-full mb-5">
                <select
                    name="area"
                    id="areas"
                    onclick="this.setAttribute('value', this.value);"
                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                >
                    <option value=""></option>
                </select>
                <label for="area" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select Area</label>
            </div>

            <div class="relative z-0 w-full mb-5">
                <input
                    type="text"
                    name="address"
                    placeholder=" "
                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                />
                <label for="address" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Enter Address</label>
                <span class="text-sm text-red-600 hidden" id="error">Address is required</span>
            </div>

            <div class="relative z-0 w-full mb-5">
                Select Recycling Materials:
                <div class="flex flex-col">
                    <?php
                    while ($material = mysqli_fetch_assoc($materials)){
                        echo '
                        <label class="inline-flex items-center mt-3">
                        <input name="material[]" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" value="'.$material['id'].'"><span class="ml-2 text-gray-700">'.$material['name'].'</span>
                    </label>
                        ';
                    }
                    ?>
                </div>
            </div>

            <div class="flex flex-row space-x-4">
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        name="lat"
                        placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                    <label for="date" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Latitude</label>
                    <span class="text-sm text-red-600 hidden" id="error">Latitude is required</span>
                </div>
                <div class="relative z-0 w-full">
                    <input
                        type="text"
                        name="lng"
                        placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                    <label for="time" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Longitude</label>
                    <span class="text-sm text-red-600 hidden" id="error">Longitude is required</span>
                </div>
            </div>

            <input
                name="addStation"
                type="submit"
                value="Save"
                class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
            />
        </form>
    </div>
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script>
    $( "#city" ).change(function() {
        var cityId = $(this).val();
        $.ajax({
            url: "Resources/Php/getAreas.php?city_id=" + cityId,
        }).done(function(data) {
            data = JSON.parse(data);
            $('#areas').empty();
            $.each(data, function(i, item) {
                console.log(item);
                $('#areas').append($('<option>', {value:i, text:item}));
            });
        });
    });
</script>
<?php
include 'footer.php';
?>
