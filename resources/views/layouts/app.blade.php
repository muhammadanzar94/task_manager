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
            const deleteSelectedButton = document.getElementById('delete-selected');

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    card.classList.toggle('selected');
                    updateDeleteSelectedButtonVisibility();
                });
            });

            deleteSelectedButton.addEventListener('click', function () {
                const selectedCards = document.querySelectorAll('.selectable-card.selected');
                selectedCards.forEach(card => {
                    card.remove();
                });
                updateDeleteSelectedButtonVisibility();
            });

            function updateDeleteSelectedButtonVisibility() {
                const selectedCards = document.querySelectorAll('.selectable-card.selected');
                if (selectedCards.length > 0) {
                    deleteSelectedButton.style.display = 'block';
                } else {
                    deleteSelectedButton.style.display = 'none';
                }
            }
        });
    </script>
    @yield('content')
    <!-- Include your JavaScript here -->
</body>
</html>
