<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<footer>
        <!-- Je crée une nouvelle ligne dans ma grille virtuelle: https://getbootstrap.com/docs/4.1/layout/grid/
                        Je déclare également que ces elements doivent être centré (flex): https://getbootstrap.com/docs/4.1/utilities/flex/#justify-content
                        ainsi que leur textes: https://getbootstrap.com/docs/4.1/utilities/text/#text-alignment -->
    <div class="row justify-content-center text-center">
        <div class="col-6 social-networks">
                <!-- Je créé une liste: https://getbootstrap.com/docs/4.1/components/list-group/ -->
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                 <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-github-square"></i></a></li>
            </ul>
        </div>
    </div>
        
        <!-- Je crée une nouvelle ligne dans ma grille virtuelle: https://getbootstrap.com/docs/4.1/layout/grid/
                        Je déclare également que ces elements doivent être centré (flex): https://getbootstrap.com/docs/4.1/utilities/flex/#justify-content
                        ainsi que leur textes: https://getbootstrap.com/docs/4.1/utilities/text/#text-alignment -->
    <div class="row justify-content-center text-center">
        <div class="col-9 links">
                <!-- Je créé une liste: https://getbootstrap.com/docs/4.1/components/list-group/ -->
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Nous contacter</a></li>
                <li class="list-inline-item"><a href="#">Qui sommes nous ?</a></li>
                <li class="list-inline-item"><a href="#">Mentions légales</a></li>
            </ul>
        </div>
    </div>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>

<?php wp_footer(); ?>

</body>
</html>
