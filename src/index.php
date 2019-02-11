<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil - Organization</title>
    <?php require("require.php"); ?>
</head>

<body>
    <?php require('navbar.php');?>
    <div class="jumbotron">
        <h1>Conférences</h1>
        <p class="lead">Voici les dernières conférences, n'oubliez pas de vous inscrire/connecter pour voter !</p>
        <hr class="my-4">
        <article>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                        <td>test3</td>
                    </tr>
                </tbody>
            </table>
        </article>
        <script>
            
            // $(document).ready(function () {
            //     $('#example').DataTable();
            // });
        </script>
    </div>
</body>

</html>