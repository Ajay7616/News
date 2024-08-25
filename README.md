# News Website

This project is a demo news website built using PHP and Bootstrap, with the backend powered by MySQL. The project showcases how Generative AI (Gen-AI) was used to assist in various stages of development, from fixing code errors to optimizing and enhancing the layout.

## Prerequisites

To run this website locally, you will need:

- XAMPP (or any other local server environment that supports PHP and MySQL)
- MySQL Database

## Setup Instructions

1. **Create the Database**: 
   - Import the provided SQL file into your MySQL database to set up the necessary tables and data.

2. **Configure Apache**:
   - Open your `httpd.conf` file located in the Apache configuration directory (typically found in `xampp/apache/conf`).
   - Change the `DocumentRoot` and `Directory` directives to point to your project directory, like so:
     ```
     DocumentRoot "C:/xampp/htdocs/News"
     <Directory "C:/xampp/htdocs/News">
     ```

3. **Run the Website**:
   - Start Apache and MySQL from the XAMPP Control Panel.
   - Open your browser and navigate to `http://localhost` to view the website.

## Generative AI Contributions

This project was created with the help of Gen-AI, particularly using ChatGPT. Below are some instances where AI was utilized:

1. **Rectifying a Code Error**:
   
   I created a success message to display when a user registers or publishes news. The close button wasn't functioning correctly, so I asked ChatGPT for assistance.

   **Command**:
   
   ![image](https://github.com/user-attachments/assets/81826495-f702-4028-a207-8ab48a75a87a)

   **Result**:
   
   ![image](https://github.com/user-attachments/assets/89d58d06-6cb6-4762-9b3d-b91db79a01df)

3. **Optimizing Code**:
   
   I optimized the logout code to make it more efficient.
    
   **Command**:
   
   ![image](https://github.com/user-attachments/assets/2f2cbdbf-c2e6-4f49-97d0-69b2afa00c2b)

   **Result**:
   
   ![image](https://github.com/user-attachments/assets/c0f48b3d-30cf-4b53-9a17-12c2c6770f92)

3. **Changing Page Layout**:

   I wanted to change the layout of an already created page. I provided the existing code to ChatGPT and received an improved layout structure.
  
   **Command**:
    
   ![image](https://github.com/user-attachments/assets/8de5c0ff-9cf1-400f-8280-43ab9107d0a3)

   **Output**:
   
   ![image](https://github.com/user-attachments/assets/ab0d5ee6-8f18-47b7-a6ea-510b110f6065)

4. Creating a Function to Update News Content:

   I generated a function to update the news content using a simple command, leveraging the code written for submitting news content as a reference.
  
   **Command**:

   ![image](https://github.com/user-attachments/assets/d10bcdb1-b0ff-490b-858b-08e5418b211d)
   
   **Output**:

   ![image](https://github.com/user-attachments/assets/e30443e9-2833-472f-a849-db1fdaa6bf72)


5. Generating Major Layout Content for Homepage:

   I used ChatGPT to generate the layout for the homepage, resulting in a well-structured design.

   **Command**:

   ![image](https://github.com/user-attachments/assets/a251d16e-c57a-439d-99e0-0523f2318c36)
    
   **Output**:

   ![image](https://github.com/user-attachments/assets/8cd65d55-725b-4a16-a778-a3f7fc9e21ae)


## Conclusion

By incorporating Gen-AI into the development process, the overall project time was significantly reduced, allowing for faster completion and enhanced code efficiency. If you're interested in exploring the capabilities of Gen-AI in coding, this project serves as a practical example of how AI can assist developers.
