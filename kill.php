<?php
session_start();
session_destroy();
?>
<script>
    localStorage.clear();
    alert("¡Bugs eliminados! El carrito ahora está realmente vacío.");
    window.location.href = "index.php";
</script>