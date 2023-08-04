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
            const createTaskButton = document.getElementById('create-task');
            const taskNameInput = document.getElementById('task-name');

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


            createTaskButton.addEventListener('click', function () {
                const taskName = taskNameInput.value;
                if (taskName.trim() !== '') {
                    const newCard = document.createElement('div');
                    newCard.classList.add('card', 'selectable-card');
                    newCard.innerHTML = `
                        <div class="card-body">
                            <h5 class="card-title">${taskName}</h5>
                        </div>
                    `;
                    newCard.addEventListener('click', function () {
                        newCard.classList.toggle('selected');
                        updateDeleteSelectedButtonVisibility();
                    });

                    document.querySelector('.card-container').appendChild(newCard);
                    taskNameInput.value = '';
                    updateDeleteSelectedButtonVisibility();
                }
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
