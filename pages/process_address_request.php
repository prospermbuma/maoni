<?php
if (isset($_POST["region"])) {
    // Capture selected region
    $region = $_POST["region"];

    // Define region and district array
    $regionArr = array(
        "Arusha" => array("Arusha", "Arumeru", "Ngorongoro", "Longido", "Monduli", "Karatu"),
        "Dar es salaam" => array("Temeke", "Ilala", "Kinondoni", "Ubungo", "Kigamboni"),
        "Dodoma" => array("Chamwino", "Dodoma", "Chemba", "Kondoa", "Bahi", "Mpwapwa", "Kongwa"),
        "Geita" => array("Bukombe", "Mbogwe", "Nyang'wale", "Geita", "Chato"),
        "Iringa" => array("Kilolo", "Mufindi", "Iringa"),
        "Kagera" => array("Bukoba", "Biharamulo", "Karagwe", "Muleba", "Kyerwa", "Ngara", "Missenyi"),
        "Katavi" => array("Mlele", "Mpanda", "Tanganyika"),
        "Kigoma" => array("Kigoma", "Kasulu", "Kakonko", "Uvinza", "Buhigwe ", "Kibondo"),
        "Kilimanjaro" => array("Siha", "Moshi", "Mwanga", "Rombo", "Hai", "Same"),
        "Lindi" => array("Nachingwea", "Ruangwa", "Liwale", "Lindi", "Kilwa"),
        "Manyara" => array("Babati", "Mbulu", "Hanang'", "Kiteto", "Simanjiro"),
        "Mara" => array("Bunda", "Serengeti", "Rorya", "Tarime", "Butiama", "Musoma"),
        "Mbeya" => array("Chunya", "Kyela", "Mbeya", "Rungwe", "Mbarali"),
        "Morogoro" => array("Gairo", "Kilombero", "Mvomero", "Morogoro", "Ulanga", "Kilosa", "Malinyi"),
        "Mtwara" => array("Newala", "Nanyumbu", "Mtwara", "Masasi", "Tandahimba"),
        "Mwanza" => array("Ilemela", "Kwimba", "Sengerema", "Nyamagana", "Magu", "Ukerewe", "Misungwi"),
        "Njombe" => array("Njombe", "Ludewa", "Wanging'ombe", "Makete"),
        "Pwani" => array("Bagamoyo", "Mkuranga", "Rufiji", "Mafia", "Kibaha", "Kisarawe", "Kibiti"),
        "Rukwa" => array("Sumbawanga", "Nkasi", "Kalambo"),
        "Ruvuma" => array("Namtumbo", "Mbinga", "Nyasa", "Tunduru", "Songea"),
        "Shinyanga" => array("Kishapu", "Kahama", "Shiyanga"),
        "Simiyu" => array("Busega", "Maswa", "Bariadi", "Meatu", "Itilima"),
        "Singida" => array("Mkalama", "Manyoni", "Singida", "Ikungi", "Iramba"),
        "Songwe" => array("Songwe", "Ileje", "Mbozi", "Momba"),
        "Tabora" => array("Nzega", "Kaliua", "Igunga", "Sikonge", "Tabora", "Urambo", "Uyui"),
        "Tanga" => array("Lushoto", "Handeni", "Pangani", "Muheza", "Tanga", "Mkinga", "Korogwe", "Kilindi")
    );

    // Display district dropdown based on region name
    if ($region !== 'Chagua Mkoa') {
        echo '
        <div class="districts">
            <div class="input-area">
                <select name="district" id="district">';
        foreach ($regionArr[$region] as $value) {
            echo "<option>" . $value . "</option>";
        }
        echo '</select>
              <i class="icon fas fa-map-marker-alt"></i>
        </div>';
        echo '</div>';
    } else {
        echo ' <div class="districts">
        <div class="input-area">
            <select name="district" id="district">
                <option>Chagua Wilaya</option>
            </select>
            <i class="icon fas fa-map-marker-alt"></i>
        </div>
    </div>';
    }
}
