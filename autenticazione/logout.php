<?php
    // recuperailriferimentoallasessione
    session_start();
    // distruggela sessione
    session_destroy();
    // redirezioneautomatica a form.php
    header("Location: form.php");
?>