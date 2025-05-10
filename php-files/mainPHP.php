<?php

class Client {
    protected $name;
    public $position;
    public $comment;
    public $rating;
    private $imageSrc;

    public function __construct($name, $position, $comment, $rating, $imageSrc) {
        $this->name = $name;
        $this->position = $position;
        $this->comment = $comment;
        $this->rating = $rating;
        $this->imageSrc = $imageSrc;
    }
    public function __destruct() {
      echo "<script>console.log('Client with name " . $this->name . " u shkatërrua nga memoria');</script>";
  }   
    public function setImageSrc($newImageSrc) {
      $this->imageSrc=$newImageSrc;
    }
    public function getImageSrc() {
      return $this->imageSrc;
    }
    public function renderClient() {
        return "
            <div class='swiper-slide'>
                <div class='client__card'>
                    <div class='client__ratings'>
                        " . str_repeat('<span><i class="ri-star-fill"></i></span>', $this->rating) . "
                    </div>
                    <p>{$this->comment}</p>
                    <div class='client__details'>
                        <img src='{$this->imageSrc}' alt='client' />
                        <div>
                            <h4>{$this->name}</h4>
                            <h5>{$this->position}</h5>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
}

$client1 = new Client(
    "Luan", 
    "Trajner Fitnesi", 
    "Sesionet e mia të stërvitjes kanë arritur nivele të reja intensiteti dhe motivimi, falë ritmeve energjike dhe këngëve fuqizuese që Illyric ka bërë.", 
    5, 
    "foto/gymtrainer.jpg"
);

$client2 = new Client(
    "Sara", 
    "Menaxhere Marketingu", 
    "Në mes të orarit tim të ngarkuar, meloditë qetësuese të Illyric ofrojnë një shpëtim të nevojshëm, duke më lejuar të relaksohem dhe të rimarr energji.", 
    5, 
    "foto/marketingmanager.jpg"
);

$client3 = new Client(
    "Vjollca", 
    "Edukatore", 
    "Duke shfrytëzuar meloditë qetësuese të Illyric, krijoj një ambient të qetë mësimor në klasën time dhe nxis suksesin akademik mes studentëve të mi.", 
    5, 
    "foto/teacher.jpg"
);

$client4 = new Client(
    "Arti", 
    "Artist", 
    "Si krijues muzike, gjithmonë befasohem nga krijimtaria dhe inovacioni që Illyric sjell në dispozicion, duke inspiruar përpjekjet e mia artistike.", 
    5, 
    "foto/rapper.jpg"
);

$clients = [$client1, $client2, $client3, $client4];

$swiperContent = "";
foreach ($clients as $client) {
    $swiperContent .= $client->renderClient();
}

// echo "<div class='swiper-wrapper'>$swiperContent</div>";

?>