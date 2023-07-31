$(document).ready(function() {
  let editTaskItem = null;

  // Function to add a new task
  function addTask(taskText, isCompleted) {
    const taskItem = $('<li><span class="taskText"></span><div class="tools"><button class="complete"><i class="fas fa-check"></i></button><button class="edit">EDIT</button><button class="delete"><i class="fas fa-times"></i></button></div></li>');
    taskItem.find('.taskText').text(taskText);

    if (isCompleted) {
      taskItem.find('.taskText').addClass('completed');
    }

    // Edit task button click handler
    taskItem.find('.edit').on('click', function() {
      editTaskItem = taskItem;
      const taskText = taskItem.find('.taskText').text();
      $('.popup-input').val(taskText);
      $('.popup').fadeIn();
    });

    // Complete task button click handler
    taskItem.find('.complete').on('click', function() {
      isCompleted = !isCompleted;
      taskItem.find('.taskText').toggleClass('completed');
      updateLocalStorage();
    });

    // Delete task button click handler
    taskItem.find('.delete').on('click', function() {
      taskItem.remove();
      updateLocalStorage();
    });

    $('#taskList').append(taskItem);
  }

  // Load tasks from localStorage on page load
  function loadTasks() {
    const savedTasks = JSON.parse(localStorage.getItem('tasks')) || [];
    savedTasks.forEach(task => {
      addTask(task.text, task.isCompleted);
    });
  }

  // Update tasks in localStorage
  function updateLocalStorage() {
    const tasks = [];
    $('#taskList li').each(function() {
      const taskText = $(this).find('.taskText').text();
      const isCompleted = $(this).find('.taskText').hasClass('completed');
      tasks.push({ text: taskText, isCompleted: isCompleted });
    });

    localStorage.setItem('tasks', JSON.stringify(tasks));
  }

  // Add task button click handler
  $('.btn-add').on('click', function() {
    const taskText = $('.todo-input').val().trim();
    if (taskText !== '') {
      addTask(taskText, false);
      $('.todo-input').val('');
      updateLocalStorage();
    }
  });

  // Enter key press event handler for task input
  $('.todo-input').on('keypress', function(event) {
    if (event.which === 13) {
      const taskText = $(this).val().trim();
      if (taskText !== '') {
        addTask(taskText, false);
        $(this).val('');
        updateLocalStorage();
      }
    }
  });


  // Load tasks from localStorage on page load
  loadTasks();

  // Update task on 'Update' button click
  $('.popup-btn.accept').on('click', function() {
    if (editTaskItem) {
      const newText = $('.popup-input').val().trim();
      if (newText !== '') {
        editTaskItem.find('.taskText').text(newText);
        updateLocalStorage();
        $('.popup').fadeOut();
      }
    }
  });

  // Cancel editing on 'Cancel' button click
  $('.popup-btn.cancel').on('click', function() {
    $('.popup').fadeOut();
  });

  
});


