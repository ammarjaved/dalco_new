<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script type="importmap">
            {
              "imports": {
                "@material/web/": "https://esm.run/@material/web/"
              }
            }
          </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

      

        <title>DALCO</title>
        <script type="module">
            import '@material/web/all.js';
            import {styles as typescaleStyles} from '@material/web/typography/md-typescale-styles.js';
        
            document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
          </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
      
                {{ $slot }}
    </body>
</html>
