<?php

$rota_encontrada = false;
function rota($rota, $f) {
    $rota_atual = strtok($_SERVER['REQUEST_URI'], '?');

    // Corrigindo para que a rota principal redirecione corretamente
    if ($rota_atual == $rota || $rota_atual == $rota . "/") {
        $rota_encontrada = true;
        $f(); // Chama a função
        exit;
    }
}

// Definindo as rotas
rota("/", function() {
    include "./view/inicial.php";
});
rota("/adm", function() {
    include "./view/pagina_adm.php"; 
});
rota("/capoeira", f: function(){
    include "./view/pagina_adm_capoeira.php";
});
rota("/futebol", function(){
    include "./view/pagina_adm_futebol.php";
});
rota("/danca", function(){
    include "./view/pagina_adm_danca.php";
});

if(!$rota_encontrada){
    include "./view/404.php";
}