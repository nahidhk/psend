  // Select all input fields with class "numberInput"
  const inputs = document.querySelectorAll('.coma');

  inputs.forEach((input) => {
      input.addEventListener('input', (event) => {
          const cursorPosition = event.target.selectionStart; // Track cursor position
          const value = event.target.value.replace(/,/g, ''); // Remove commas for processing

          // Check if the value is a valid number
          if (!isNaN(value) && value !== "") {
              const formattedValue = new Intl.NumberFormat('en-US').format(value);

              // Update the input field with the formatted value
              event.target.value = formattedValue;

              // Restore cursor position
              event.target.selectionStart = event.target.selectionEnd = cursorPosition + (formattedValue.length - value.length);
          }
      });
  });