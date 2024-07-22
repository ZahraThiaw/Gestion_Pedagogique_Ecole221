<?php
require_once '../Views/layout/header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des sessions de cours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales/fr.js"></script>
    <style>
        .fc-timegrid-hour {
            height: calc((20 - 8) * 3rem); /* Limite la hauteur du calendrier entre 08h et 20h */
            overflow-y: auto; /* Ajoute une barre de défilement si nécessaire */
        }
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5 p-5">
        <h1 class="text-3xl font-bold mb-5 text-center">Calendrier des sessions de cours</h1>
        
        <!-- Contrôles pour sélectionner une date ou une semaine -->
        <div class="mb-5 text-center">
            <input type="date" id="selectDate" class="border border-gray-300 rounded-lg px-3 py-2 mr-2">
            <!-- <input type="week" id="selectWeek" class="border border-gray-300 rounded-lg px-3 py-2"> -->
            <button id="goToDate" class="ml-2 bg-purple-700 text-white px-4 py-2 rounded-md">Aller à la date</button>
            <!-- <button id="goToWeek" class="ml-2 bg-purple-700 text-white px-4 py-2 rounded-md">Aller à la semaine</button> -->
        </div>

        <div id="calendar" class="bg-white shadow-lg rounded-lg p-5"></div>
    </div>

    <div class="notification" id="notification"></div>

    <!-- Modal d'annulation -->
    <div id="cancelModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Confirmer l'annulation</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Êtes-vous sûr de vouloir annuler cette session de cours ?</p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="confirmCancel" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">Confirmer</button>
                    <button id="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var sessions = <?php echo json_encode($sessions); ?>;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr', // Utilisation de la locale française
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: sessions,
                visibleRange: {
                    start: '08:00:00',
                    end: '20:00:00'
                },
                slotMinTime: '08:00:00',
                slotMaxTime: '20:00:00',
                eventClick: function (info) {
                    var sessionId = info.event.id;
                    var sessionStatut = info.event.extendedProps.statut;
                    console.log(sessionStatut);

                    if (sessionStatut === 'Prévue') {
                        document.getElementById('cancelModal').classList.remove('hidden');
                        document.getElementById('confirmCancel').onclick = function () {
                            fetch('/sessiondecour/cancel', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: 'session_id=' + sessionId
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    showNotification(data.message, 'success');
                                    calendar.refetchEvents();
                                } else {
                                    showNotification(data.message, 'error');
                                }
                            })
                            .catch(error => console.error('Error:', error));

                            document.getElementById('cancelModal').classList.add('hidden');
                        };
                    } else {
                        showNotification('Seules les sessions prévues peuvent être annulées.', 'error');
                    }
                }
            });

            calendar.render();

            document.getElementById('closeModal').onclick = function () {
                document.getElementById('cancelModal').classList.add('hidden');
            };

            document.getElementById('goToDate').onclick = function () {
                var date = document.getElementById('selectDate').value;
                if (date) {
                    calendar.gotoDate(date);
                }
            };

            // document.getElementById('goToWeek').onclick = function () {
            //     var week = document.getElementById('selectWeek').value;
            //     if (week) {
            //         var startDate = new Date(week + '-01'); // Premier jour de la semaine
            //         var endDate = new Date(startDate);
            //         endDate.setDate(startDate.getDate() + 6); // Dernier jour de la semaine
            //         calendar.gotoDate(startDate);
            //         calendar.changeView('timeGridWeek', { start: startDate, end: endDate });
            //     }
            // };

            function showNotification(message, type) {
                var notification = document.getElementById('notification');
                notification.textContent = message;
                notification.style.backgroundColor = type === 'success' ? '#d4edda' : '#f8d7da';
                notification.style.color = type === 'success' ? '#155724' : '#721c24';
                notification.style.display = 'block';
                setTimeout(function () {
                    notification.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
