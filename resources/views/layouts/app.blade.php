<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
    <!-- Include your CSS and Bootstrap here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.selectable-card');
            const deleteAllButton = document.getElementById('delete-all');

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    card.classList.toggle('selected');
                    updateDeleteAllButtonVisibility();
                });
            });

            function updateDeleteAllButtonVisibility() {
                const selectedCards = document.querySelectorAll('.selectable-card.selected');
                if (selectedCards.length > 0) {
                    deleteAllButton.style.display = 'block';
                } else {
                    deleteAllButton.style.display = 'none';
                }
            }
        });
    </script>
    @yield('content')
    <!-- Include your JavaScript here -->
</body>
</html>
