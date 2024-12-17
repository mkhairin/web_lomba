<?php

if (!function_exists('swal')) {
    function swal($title = '', $text = '', $icon = 'success') {
        $script = "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '$title',
                    text: '$text',
                    icon: '$icon'
                });
            });
        </script>";
        echo $script;
    }
}
