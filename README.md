# Local Add Page Module to Course Web Service Function Plugin for Moodle

<div align="center">
    <img src="https://umami-learning.com/wp-content/uploads/2023/01/Asset-14@4x-1-1536x361.png" alt="UMAMI E-Learning Solutions Logo" width="300"/>
</div>

## Description

Local Add Page Module to Course Web Service Function Plugin by UMAMI E-Learning Solutions is a Moodle plugin designed to enhance course content management. It allows administrators to seamlessly add page modules to Moodle courses through web service moodle api as a function. This plugin streamlines the process of incorporating rich text content into courses.

## Features

- Add page modules to courses with ease.
- Support for rich text content.

## Installation

1. Download the plugin from GitHub.
2. Go to Site adminstration > Plugins > Add Plugin

Or you can add it manually:

1. Unzip and place the folder in your Moodle installation under `local/`.
2. Log in to your Moodle site as an admin and visit the notifications page to complete the installation.
3. Configure the plugin if necessary from the settings page.

## API Usage

To add a page module to a course via the web service API, send a POST request with the following parameters:

- `wsfunction`: The custom function name (local_addpage_add_page_module).
- `courseid`: The ID of the course where the page will be added.
- `sectionid`: The ID of the course section where the page will be placed.
- `title`: The title of the page.
- `content`: The HTML content of the page.

Example JSON payload:

```json
{
    "wstoken":<YOUR_TOKEN>,
    "wsfunction":"local_addpage_add_page_module",
    "courseid": 123,
    "sectionid": 1,
    "title": "Introduction to the Course",
    "content": "<p>Welcome to our new course. This is the introductory page.</p>"
}
```

Example Responce :

```json
{
  "status": "success",
  "message": "Page module added successfully"
}
```

## Requirements

- Moodle 3.5 or higher.

## Author

UMAMI E-Learning Solutions

- **Email:** [hatem.askar@umami-learning.com](mailto:hatem.askar@umami-learning.com)

## License

This plugin is licensed under the GNU GPL v3 or later. A copy of the GNU GPL v3 can be found at [http://www.gnu.org/copyleft/gpl.html](http://www.gnu.org/copyleft/gpl.html).

---

For more information, visit [UMAMI E-Learning Solutions](https://umami-learning.com).
