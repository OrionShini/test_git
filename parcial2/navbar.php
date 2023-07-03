<div class="navbar">
    <?php
    function p1() {
        echo "<a href='inicio.php' class='" . (getCurrentPage() == 'inicio.php' ? 'active' : '') . "'>Inscripción Alum.</a>";
    }

    function p2() {
        echo "<a href='mesa_form.php' class='" . (getCurrentPage() == 'mesa_form.php' ? 'active' : '') . "'>Mesas Examenes</a>";
    }

    function p3() {
        echo "<a href='alumnos_form.php' class='" . (getCurrentPage() == 'alumnos_form.php' ? 'active' : '') . "'>Registrar Alumnos</a>";
    }
    function p4() {
        echo "<a href='inscribe_listado.php' class='" . (getCurrentPage() == 'inscribe_listado.php' ? 'active' : '') . "'>Panel Inscripciones</a>";
    }
    function p5() {
        echo "<a href='usuario_form.php' class='" . (getCurrentPage() == 'usuario_form.php' ? 'active' : '') . "'>Panel Usuarios</a>";
    }
    function salir() {
        echo "<a href='logout.php' class='" . (getCurrentPage() == 'logout.php' ? 'active' : '') . "'>Salir</a>";
    }

    function getCurrentPage() {
        return basename($_SERVER['PHP_SELF']);
    }

    p1();
    p2();
    p3();
    p4();
    p5();
    salir();
    require 'funciones.php';
    ?>
</div>