<!--COMPOSIÇÃO-->

<?php
    class Vida  {

        public function engravidar(){
            echo "Engravidar\n";
        }
        public function nascer( ) {
            echo "Nascer\n";
        }
        public function crescer() {
            echo "Crescer\n";
        }
        public function fazerEscolhas() {
            echo "Fazendo escolhas\n";
        }
    }
    class Sangue {
        public function doar() {
            echo "Doar sangue para ajudar pessoas\n";
        }
    }

    $vida = new Vida();
    $vida->engravidar();
    $vida->nascer();
    $vida->crescer();
    $vida->fazerEscolhas();
    $sangue = new Sangue();
    $sangue->doar();

?>