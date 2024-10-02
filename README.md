# Basic Hindi POS Tagger

This is a web-based Part-of-Speech (POS) tagger for Hindi text, hosted on [Render](https://hindi-pos-tagger.onrender.com). The application allows users to input Hindi text and returns the corresponding POS tags.

## Features

- Input Hindi text directly on the webpage.
- Automatically tag each word with its Part-of-Speech (POS).
- Simple and user-friendly interface.
  
## Technologies Used

- **PHP**: For server-side processing.
- **HTML & CSS**: For the front-end user interface.
- **Apache**: Web server.
- **Render**: Hosting platform.

## How It Works

1. Navigate to the application: <a href="https://hindi-pos-tagger-lnfs.onrender.com/" target="_blank">Hindi POS Tagger</a>.
2. Enter Hindi text in the input field.
3. Click the "Submit" button to tag the words with their respective POS tags.
4. The result will display the tagged text, with each word annotated with its corresponding POS.

## Project Files

- **index.php**: Main application logic for the POS tagger.
- **style.css**: Styling for the web interface.
- **preprocessed_pos.txt**: A reference file used by the application to perform POS tagging.

## Getting Started

If you want to run the project locally:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-username/hindi-pos-tagger.git
    cd hindi-pos-tagger
    ```

2. **Run locally with PHP**:
    ```bash
    php -S localhost:8000
    ```

3. **Access the application** at [http://localhost:8000](http://localhost:8000) in your browser.

## Deployment

The project is deployed on Render using Docker. The deployment uses an Apache server and PHP to handle requests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgements

- [Render](https://render.com) for hosting the application.
- [PHP](https://www.php.net/) for the server-side language.
- Hindi POS corpus for language data.

