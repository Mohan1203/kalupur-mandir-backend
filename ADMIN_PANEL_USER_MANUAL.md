# Kalupur Museum Admin Panel - User Manual

**Version:** 1.0  
**Last Updated:** 2024

---

## Table of Contents

1. [Introduction](#introduction)
2. [Getting Started](#getting-started)
3. [Login & Authentication](#login--authentication)
4. [Dashboard Overview](#dashboard-overview)
5. [Home Page Management](#home-page-management)
6. [Parsadi Darshan Management](#parsadi-darshan-management)
7. [Testimonials Management](#testimonials-management)
8. [Booking Management](#booking-management)
9. [Acharya Management](#acharya-management)
10. [Yajman Management](#yajman-management)
11. [Event Gallery Management](#event-gallery-management)
12. [Photo Gallery Management](#photo-gallery-management)
13. [About Us Management](#about-us-management)
14. [Pages Management](#pages-management)
15. [SEO Management](#seo-management)
16. [Settings Management](#settings-management)
17. [Donation Management](#donation-management)
18. [Pooja Booking Management](#pooja-booking-management)
19. [Troubleshooting](#troubleshooting)
20. [Appendix](#appendix)

---

## Introduction

### Welcome

Welcome to the Kalupur Museum Admin Panel User Manual. This comprehensive guide will help you understand and effectively use all the features available in the admin panel to manage your museum's website content.

### What is This Admin Panel?

The Kalupur Museum Admin Panel is a web-based content management system built on Laravel framework. It allows administrators to:

- Manage website content without technical knowledge
- Upload and organize images and media
- Handle bookings and donations
- Manage testimonials and gallery content
- Configure SEO settings
- Update website settings and information

### Who Should Use This Manual?

This manual is designed for:
- Website administrators
- Content managers
- Staff members responsible for updating website content
- Anyone who needs to manage the museum's online presence

---

## Getting Started

### System Requirements

Before accessing the admin panel, ensure you have:

- A modern web browser (Chrome, Firefox, Safari, or Edge)
- A stable internet connection
- Admin credentials (provided by your system administrator)

### Accessing the Admin Panel

1. Open your web browser
2. Navigate to the admin panel URL (provided by your system administrator)
3. You will be redirected to the login page

---

## Login & Authentication

### Admin Credentials

**Default Login Credentials:**

- **Email:** `admin@gmail.com`
- **Password:** `admin@123`

> **Important Security Note:** Please change your password immediately after first login for security purposes.

### How to Login

1. Navigate to the login page (`/login`)
2. Enter your email address in the "Email" field
3. Enter your password in the "Password" field
4. Click the "Login" button or press Enter

### After Successful Login

- You will be redirected to the dashboard (home page)
- Your session will remain active until you log out
- You can navigate to different sections using the navigation menu

### Logging Out

1. Click on the "Logout" button (usually located in the top navigation or sidebar)
2. You will be logged out and redirected to the login page
3. Your session will be cleared for security

### Troubleshooting Login Issues

**Problem:** "Wrong email or password" error

**Solutions:**
- Double-check that you're using the correct email and password
- Ensure Caps Lock is not enabled
- Check for any extra spaces before or after your credentials
- Contact your system administrator if the problem persists

---

## Dashboard Overview

### What is the Dashboard?

The dashboard is the main control center of your admin panel. It provides:

- Quick access to all major features
- Overview of recent activities
- Navigation to different sections

### Navigation Menu

The admin panel typically includes navigation to the following sections:

- **Home** - Home page content management
- **Parsadi Darshan** - Manage Parsadi Darshan content
- **Testimonials** - Manage visitor testimonials
- **Bookings** - Manage booking information
- **Acharya** - Manage Acharya profiles
- **Yajman** - Manage Yajman events
- **Event Gallery** - Manage event photos
- **Photo Gallery** - Manage general photo gallery
- **About Us** - Manage about us page and timings
- **Pages** - Manage policy pages
- **SEO** - Manage SEO settings
- **Settings** - Configure general settings
- **Donations** - View donation records
- **Pooja Bookings** - View pooja booking requests

---

## Home Page Management

### Overview

The Home Page Management section allows you to manage the main content displayed on your website's homepage, including videos and images.

### Accessing Home Page Management

1. After logging in, you'll be on the dashboard/home page
2. The home page management interface will be displayed

### Features Available

#### 1. Managing Home Video

**Purpose:** Set the main video that appears on the homepage.

**Steps:**
1. Navigate to the Home section (dashboard)
2. Find the "Video Link" field
3. Enter the YouTube video URL or video embed link
4. Click "Save" or "Submit"

**Important Notes:**
- You can use YouTube video URLs
- Ensure the video link is valid and accessible
- The video will appear on the frontend homepage

#### 2. Managing History Video

**Purpose:** Set a video link for the history section.

**Steps:**
1. In the Home section, find the "History Video Link" field
2. Enter the video URL
3. Click "Save"

#### 3. Managing Mahapuja Image

**Purpose:** Upload or update the Mahapuja image displayed on the website.

**Steps:**
1. Find the "Pooja Image" upload field
2. Click "Choose File" or "Browse"
3. Select an image file from your computer
4. Supported formats: JPEG, PNG, JPG, GIF, WEBP
5. Click "Save"

**Note:** Uploading a new image will replace the existing one automatically.

#### 4. Managing Yagna Image

**Purpose:** Upload or update the Yagna image displayed on the website.

**Steps:**
1. Find the "Yagna Image" upload field
2. Click "Choose File" or "Browse"
3. Select an image file from your computer
4. Supported formats: JPEG, PNG, JPG, GIF, WEBP
5. Click "Save"

### Best Practices

- Use high-quality images for better website appearance
- Keep image file sizes reasonable (under 2MB recommended)
- Ensure videos are publicly accessible
- Test changes on the frontend after saving

---

## Parsadi Darshan Management

### Overview

Parsadi Darshan Management allows you to add, edit, and delete Parsadi Darshan entries that are displayed on your website.

### Accessing Parsadi Darshan Management

1. Click on "Parsadi Darshan" in the navigation menu
2. You'll see a list of all existing Parsadi Darshan entries

### Adding a New Parsadi Darshan Entry

**Steps:**
1. Navigate to the Parsadi Darshan section
2. Fill in the following fields:
   - **Heading/Title:** Enter a descriptive title for the entry
   - **Description:** Enter detailed description (optional)
   - **Image:** Upload an image file
3. Click "Save" or "Submit"
4. You'll see a success message confirming the entry was added

**Image Requirements:**
- Supported formats: JPEG, PNG, JPG, SVG, WEBP
- Recommended size: Optimize images before uploading

### Editing an Existing Parsadi Darshan Entry

**Steps:**
1. Navigate to the Parsadi Darshan list page
2. Find the entry you want to edit
3. Click the "Edit" button (usually an icon or link)
4. Modify the fields you want to change:
   - Update the heading/title if needed
   - Update the description if needed
   - Upload a new image if you want to replace the existing one
5. Click "Update" or "Save Changes"
6. You'll be redirected back to the list page with a success message

**Note:** If you upload a new image, the old image will be automatically deleted.

### Deleting a Parsadi Darshan Entry

**Steps:**
1. Navigate to the Parsadi Darshan list page
2. Find the entry you want to delete
3. Click the "Delete" button (usually a trash icon)
4. Confirm the deletion if prompted
5. The entry will be removed permanently

**Warning:** Deletion is permanent and cannot be undone. Make sure you want to delete the entry before confirming.

### Viewing Parsadi Darshan Entries

- All entries are displayed in a list format
- You can see the title, description preview, and image thumbnail
- Entries are typically sorted by creation date (newest first)

---

## Testimonials Management

### Overview

Testimonials Management allows you to manage visitor testimonials that appear on your website. These testimonials help build trust and showcase visitor experiences.

### Accessing Testimonials Management

1. Click on "Testimonials" in the navigation menu
2. You'll see a list of all existing testimonials

### Adding a New Testimonial

**Steps:**
1. Navigate to the Testimonials section
2. Fill in the testimonial form with the following information:
   - **Name:** Enter the visitor's name
   - **Country:** Enter the visitor's country
   - **Description:** Enter the testimonial text/quote
3. Click "Save" or "Submit"
4. A success message will confirm the testimonial was added

**Best Practices:**
- Use real visitor names (with permission)
- Keep testimonials authentic and genuine
- Ensure descriptions are appropriate and relevant

### Editing an Existing Testimonial

**Steps:**
1. Navigate to the Testimonials list page
2. Find the testimonial you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the name if needed
   - Update the country if needed
   - Update the description/testimonial text
5. Click "Update" or "Save Changes"
6. You'll be redirected back with a success message

### Deleting a Testimonial

**Steps:**
1. Navigate to the Testimonials list page
2. Find the testimonial you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. The testimonial will be permanently removed

**Note:** Deleted testimonials cannot be recovered.

### Viewing Testimonials

- Testimonials are displayed in a list format
- You can see the name, country, and description
- Testimonials are typically sorted by creation date (newest first)

---

## Booking Management

### Overview

Booking Management is a crucial feature that allows you to manage booking-related content and information displayed on your website. This section handles two main types of bookings: **Pooja Bookings** and **Yagna Bookings**.

### Understanding Booking Management

The Booking Management system works in two parts:

1. **Content Management** - Managing descriptions and information about bookings
2. **Booking Requests** - Viewing and managing actual booking requests from visitors

### Accessing Booking Management

1. Click on "Bookings" in the navigation menu
2. You'll see the booking management interface

### Managing Booking Content

#### Managing Pooja Description

**Purpose:** Set or update the description text for Pooja bookings that appears on the website.

**Steps:**
1. Navigate to the Bookings section
2. Find the "Pooja Description" field or tab
3. Enter or edit the description text
4. Click "Save" or "Submit"
5. A success message will confirm: "Pooja description saved successfully!"

**What This Does:**
- The description you enter will be displayed on the frontend website
- Visitors will see this information when viewing Pooja booking options
- You can update this description anytime

#### Managing Yagna Description

**Purpose:** Set or update the description text for Yagna bookings that appears on the website.

**Steps:**
1. Navigate to the Bookings section
2. Find the "Yagna Description" field or tab
3. Enter or edit the description text
4. Click "Save" or "Submit"
5. A success message will confirm: "Yagna description saved successfully!"

**What This Does:**
- The description you enter will be displayed on the frontend website
- Visitors will see this information when viewing Yagna booking options
- You can update this description anytime

### How Booking System Works

#### Frontend Booking Process

1. **Visitor Submits Booking Request:**
   - Visitors fill out a booking form on your website
   - They provide information like:
     - First Name
     - Last Name
     - Village
     - Location (Domestic or International)
     - Phone Number
     - Preferred Way of Contact
     - Desired Booking Date

2. **System Validation:**
   - The system checks if the date is already booked
   - If the date is available, the booking is saved
   - If the date is already taken, an error message is shown to the visitor

3. **Booking Storage:**
   - Valid bookings are stored in the database
   - Each booking gets a unique identifier
   - Booking information is preserved for your review

#### Viewing Booking Requests

**Accessing Pooja Bookings:**

1. Navigate to "Pooja Bookings" in the menu (or use the route `/pooja-booking`)
2. You'll see a list of all booking requests
3. Each entry shows:
   - Visitor's name (First Name + Last Name)
   - Village
   - Location (Domestic/International)
   - Phone Number
   - Way of Contact
   - Booking Date

**What You Can Do:**
- Review all booking requests
- See which dates are booked
- Contact visitors using provided information
- Plan your schedule based on bookings

### Important Notes About Bookings

1. **Date Availability:**
   - The system prevents double-booking on the same date
   - Only one booking per date is allowed
   - Visitors will see an error if they try to book an already-booked date

2. **Booking Information:**
   - All booking details are stored securely
   - You can access booking information anytime
   - Booking history is maintained for record-keeping

3. **Contact Information:**
   - Use the provided phone numbers to contact visitors
   - Respect the "Way of Contact" preference if specified
   - Follow up on bookings as needed

### Best Practices

- **Keep Descriptions Updated:**
  - Regularly review and update Pooja and Yagna descriptions
  - Ensure information is accurate and current
  - Include relevant details visitors need to know

- **Monitor Bookings Regularly:**
  - Check booking requests frequently
  - Respond to bookings in a timely manner
  - Keep track of booked dates

- **Manage Availability:**
  - Be aware of which dates are booked
  - Plan ahead for special events or holidays
  - Consider implementing a calendar view if needed

### Troubleshooting Booking Issues

**Problem:** Cannot save booking description

**Solutions:**
- Ensure you've filled in the required field
- Check your internet connection
- Try refreshing the page and saving again
- Contact technical support if the problem persists

**Problem:** Not seeing booking requests

**Solutions:**
- Verify you're accessing the correct section
- Check if there are any bookings submitted
- Ensure you have proper permissions
- Refresh the page

---

## Acharya Management

### Overview

Acharya Management allows you to manage Acharya (spiritual leader) profiles displayed on your website. You can add, edit, and manage multiple Acharyas, with the ability to mark one as the current Acharya.

### Accessing Acharya Management

1. Click on "Acharya" in the navigation menu
2. You'll see a list of all Acharya profiles

### Adding a New Acharya

**Steps:**
1. Navigate to the Acharya section
2. Fill in the Acharya form:
   - **Name:** Enter the Acharya's full name (required)
   - **Description:** Enter biographical information or description (required)
   - **Image:** Upload a photo of the Acharya (required)
     - Supported formats: JPEG, PNG, JPG, SVG, WEBP
   - **Is Current Acharya:** Check this box if this is the current/active Acharya
3. Click "Save"
4. A success message will confirm the Acharya was added

**Important Notes:**
- Only one Acharya can be marked as "Current" at a time
- If you mark a new Acharya as current, the previous current Acharya will be automatically updated
- Use high-quality images for better presentation

### Editing an Existing Acharya

**Steps:**
1. Navigate to the Acharya list page
2. Find the Acharya you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the name if needed
   - Update the description
   - Upload a new image if you want to replace the existing one
   - Change the "Is Current Acharya" status if needed
5. Click "Update"
6. You'll be redirected back with a success message

**Note:** Uploading a new image will automatically delete the old image file.

### Setting Current Acharya

**Purpose:** Mark which Acharya is currently active/leading.

**How It Works:**
- When you mark an Acharya as "Current," all other Acharyas are automatically set to "Not Current"
- Only one Acharya can be current at any time
- This helps display the correct information on the frontend

**Steps:**
1. Edit the Acharya you want to make current
2. Check the "Is Current Acharya" checkbox
3. Save the changes
4. The system will automatically update all other Acharyas

### Deleting an Acharya

**Steps:**
1. Navigate to the Acharya list page
2. Find the Acharya you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. The Acharya profile will be permanently removed

**Warning:** Deletion is permanent. Make sure you want to delete the profile before confirming.

### Viewing Acharya Profiles

- All Acharyas are displayed in a list
- You can see the name, image thumbnail, and description preview
- Acharyas are typically sorted by creation date (newest first)
- The current Acharya may be highlighted or marked

---

## Yajman Management

### Overview

Yajman Management allows you to manage Yajman events displayed on your website. Yajman entries typically represent special events or ceremonies with associated images and dates.

### Accessing Yajman Management

1. Click on "Yajman" in the navigation menu
2. You'll see a list of all Yajman events

### Adding a New Yajman Event

**Steps:**
1. Navigate to the Yajman section
2. Fill in the Yajman form:
   - **Title:** Enter the event title/name (required)
   - **Date:** Select or enter the event date (required)
   - **Image:** Upload an image for the event (required)
     - Supported formats: JPEG, PNG, JPG, GIF, SVG, WEBP
3. Click "Save" or "Submit"
4. A success message will confirm: "Yajman added successfully"

**Image Requirements:**
- Use high-quality images
- Ensure images are relevant to the event
- Optimize file sizes before uploading

### Editing an Existing Yajman Event

**Steps:**
1. Navigate to the Yajman list page
2. Find the event you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the title if needed
   - Update the date if needed
   - Upload a new image if you want to replace the existing one
5. Click "Update"
6. You'll be redirected back with a success message: "Yajman updated successfully"

**Note:** Uploading a new image will automatically delete the old image file.

### Deleting a Yajman Event

**Steps:**
1. Navigate to the Yajman list page
2. Find the event you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. The event will be permanently removed

**Warning:** Deletion is permanent and cannot be undone.

### Viewing Yajman Events

- All events are displayed in a list format
- You can see the title, date, and image thumbnail
- Events may be sorted by date or creation date

---

## Event Gallery Management

### Overview

Event Gallery Management allows you to organize event photos in a hierarchical structure. You can create main event galleries and add multiple sub-photos to each gallery.

### Understanding the Structure

- **Main Event Gallery:** The primary event entry with a title, slug, and main image
- **Sub Event Photos:** Additional photos that belong to a specific main event gallery

### Accessing Event Gallery Management

1. Click on "Event Gallery" in the navigation menu
2. You'll see a list of all main event galleries and sub-photos

### Adding a Main Event Gallery Entry

**Steps:**
1. Navigate to the Event Gallery section
2. Fill in the main event form:
   - **Title:** Enter a descriptive title for the event (required)
   - **Slug:** Enter a URL-friendly identifier (required, must be unique)
     - Example: "annual-festival-2024"
     - Use lowercase letters, numbers, and hyphens only
   - **Image:** Upload the main event image (required)
     - Supported formats: JPEG, PNG, JPG, GIF, WEBP
3. Click "Save"
4. A success message will confirm: "Event Gallery created successfully."

**Important Notes:**
- The slug must be unique - you cannot use the same slug twice
- The slug is used in the website URL to access this gallery
- Choose descriptive slugs that are easy to remember

### Adding Sub Event Photos

**Purpose:** Add additional photos to an existing main event gallery.

**Steps:**
1. Navigate to the Event Gallery section
2. Find the "Add Sub Event Photo" form
3. Fill in the form:
   - **Select Main Event:** Choose the main event gallery from the dropdown (required)
   - **Title:** Enter a title/description for this photo (required)
   - **Image:** Upload the photo (required)
     - Supported formats: JPEG, PNG, JPG, GIF, SVG
4. Click "Save"
5. A success message will confirm: "Sub Event Gallery created successfully."

**Note:** You can add multiple sub-photos to each main event gallery.

### Editing a Main Event Gallery

**Steps:**
1. Navigate to the Event Gallery list page
2. Find the main event gallery you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the title if needed
   - Upload a new image if you want to replace the existing one
   - Note: Slug typically cannot be changed after creation
5. Click "Update"
6. You'll be redirected back with a success message: "Event Gallery updated successfully."

**Note:** Uploading a new image will automatically delete the old image file.

### Editing a Sub Event Photo

**Steps:**
1. Navigate to the Event Gallery section
2. Find the sub-photo you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the title/description if needed
   - Upload a new image if you want to replace the existing one
5. Click "Update"
6. A success message will confirm: "Sub Event Gallery updated successfully."

### Deleting Event Gallery Items

#### Deleting a Main Event Gallery

**Steps:**
1. Navigate to the Event Gallery list page
2. Find the main event gallery you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. A success message will confirm: "Event Gallery deleted successfully."

**Warning:** Deleting a main event gallery may also delete associated sub-photos. Make sure you want to delete everything before confirming.

#### Deleting a Sub Event Photo

**Steps:**
1. Navigate to the Event Gallery section
2. Find the sub-photo you want to delete
3. Click the "Delete" button for that sub-photo
4. Confirm the deletion if prompted
5. A success message will confirm: "Sub Event Gallery deleted successfully."

**Note:** Deleting a sub-photo does not affect the main event gallery.

### Viewing Event Galleries

- Main event galleries are displayed with their main images
- Sub-photos are typically grouped under their parent main event
- You can see thumbnails and titles for easy identification

### Best Practices

- **Organize Events Logically:**
  - Create main galleries for major events
  - Add multiple photos to showcase events comprehensively
  - Use descriptive titles and slugs

- **Image Management:**
  - Use high-quality images
  - Optimize file sizes before uploading
  - Ensure images are relevant to the event

- **Slug Naming:**
  - Use lowercase letters
  - Use hyphens to separate words
  - Make slugs descriptive but concise
  - Avoid special characters

---

## Photo Gallery Management

### Overview

Photo Gallery Management allows you to organize general photos in a hierarchical structure similar to Event Gallery. You can create main photo galleries and add multiple sub-photos to each gallery.

### Understanding the Structure

- **Main Photo Gallery:** The primary gallery entry with a title, slug, and main image
- **Sub Photo Gallery:** Additional photos that belong to a specific main gallery

### Accessing Photo Gallery Management

1. Click on "Photo Gallery" in the navigation menu
2. You'll see a list of all main galleries and sub-photos

### Adding a Main Photo Gallery Entry

**Steps:**
1. Navigate to the Photo Gallery section
2. Fill in the main gallery form:
   - **Title:** Enter a descriptive title for the gallery (required)
   - **Slug:** Enter a URL-friendly identifier (required, must be unique)
     - Example: "temple-photos-2024"
     - Use lowercase letters, numbers, and hyphens only
   - **Image:** Upload the main gallery image (required)
     - Supported formats: JPG, PNG, JPEG, WEBP
3. Click "Save"
4. A success message will confirm: "Saved successfully"

**Important Notes:**
- The slug must be unique
- The slug is used in the website URL
- Choose descriptive slugs

### Adding Sub Photos

**Purpose:** Add additional photos to an existing main gallery.

**Steps:**
1. Navigate to the Photo Gallery section
2. Find the "Add Sub Photo" form
3. Fill in the form:
   - **Select Main Gallery:** Choose the main gallery from the dropdown (required)
   - **Title:** Enter a title/description for this photo (required)
   - **Image:** Upload the photo (required)
     - Supported formats: JPG, PNG, JPEG, WEBP
4. Click "Save"
5. A success message will confirm: "Saved successfully"

**Note:** You can add multiple sub-photos to each main gallery.

### Editing a Main Photo Gallery

**Steps:**
1. Navigate to the Photo Gallery list page
2. Find the main gallery you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the title if needed
   - Upload a new image if you want to replace the existing one
5. Click "Update"
6. You'll be redirected back with a success message: "Updated successfully"

**Note:** Uploading a new image will automatically delete the old image file.

### Editing a Sub Photo

**Steps:**
1. Navigate to the Photo Gallery section
2. Find the sub-photo you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the title if needed
   - Upload a new image if you want to replace the existing one
5. Click "Update"
6. A success message will confirm the update

### Deleting Photo Gallery Items

#### Deleting a Main Photo Gallery

**Steps:**
1. Navigate to the Photo Gallery list page
2. Find the main gallery you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. A success message will confirm: "Deleted successfully"

**Warning:** Deleting a main gallery may affect associated sub-photos.

#### Deleting a Sub Photo

**Steps:**
1. Navigate to the Photo Gallery section
2. Find the sub-photo you want to delete
3. Click the "Delete" button for that sub-photo
4. Confirm the deletion if prompted
5. A success message will confirm: "Deleted successfully"

### Viewing Photo Galleries

- Main galleries are displayed with their main images
- Sub-photos are grouped under their parent main gallery
- You can see thumbnails and titles

### Best Practices

- Organize photos logically by category or theme
- Use descriptive titles and slugs
- Optimize image file sizes before uploading
- Use high-quality images for better presentation

---

## About Us Management

### Overview

About Us Management allows you to manage the "About Us" page content, including opening hours/timings and address information.

### Accessing About Us Management

1. Click on "About Us" in the navigation menu
2. You'll see the About Us management interface

### Managing Opening Hours/Timings

#### Adding Opening Hours

**Purpose:** Add time ranges when the museum/temple is open.

**Steps:**
1. Navigate to the About Us section
2. Find the "Add Opening Hours" form
3. Fill in the form:
   - **Start Day:** Select the starting day of the week (required unless it's a festival)
   - **End Day:** Select the ending day of the week (required unless it's a festival)
   - **Start Time:** Enter the opening time (required)
   - **End Time:** Enter the closing time (required)
   - **Is Festival:** Check this box if these hours are for a festival/special occasion
4. Click "Save"
5. A success message will confirm: "Opening hours added successfully."

**Examples:**
- Regular hours: Monday to Friday, 9:00 AM to 6:00 PM
- Weekend hours: Saturday to Sunday, 10:00 AM to 8:00 PM
- Festival hours: Check "Is Festival" and set times

#### Editing Opening Hours

**Steps:**
1. Navigate to the About Us section
2. Find the timing entry you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update start/end days if needed
   - Update start/end times if needed
   - Change festival status if needed
5. Click "Update"
6. A success message will confirm: "Opening hours updated successfully"

#### Deleting Opening Hours

**Steps:**
1. Navigate to the About Us section
2. Find the timing entry you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. A success message will confirm: "Opening hours deleted successfully"

**Warning:** Deletion is permanent.

### Managing Address Information

**Purpose:** Update the physical address of the museum/temple.

**Steps:**
1. Navigate to the About Us section
2. Find the address management section
3. Enter or update the address information
4. Click "Save"

**Note:** Address information is displayed on the frontend website.

### Viewing About Us Content

- All opening hours are displayed in a list
- You can see the day ranges, times, and festival status
- Address information is displayed separately

### Best Practices

- Keep opening hours accurate and up-to-date
- Add special hours for festivals and holidays
- Ensure address information is complete and correct
- Update hours when there are changes to operating schedule

---

## Pages Management

### Overview

Pages Management allows you to manage important policy pages on your website, including Cookie Policy, Privacy Policy, and Terms & Conditions.

### Accessing Pages Management

1. Click on "Pages" in the navigation menu
2. You'll see the Pages management interface with tabs or sections for each page type

### Managing Cookie Policy

**Purpose:** Update the Cookie Policy page content.

**Steps:**
1. Navigate to the Pages section
2. Find the "Cookie Policy" tab or section
3. Enter or edit the policy content in the text editor
4. Click "Save Cookie Policy" or "Update"
5. A success message will confirm: "Cookie Policy updated successfully!"

**Content Guidelines:**
- Include information about what cookies are used
- Explain how cookies are used on the website
- Provide information about user rights regarding cookies
- Keep content compliant with legal requirements

### Managing Privacy Policy

**Purpose:** Update the Privacy Policy page content.

**Steps:**
1. Navigate to the Pages section
2. Find the "Privacy Policy" tab or section
3. Enter or edit the policy content in the text editor
4. Click "Save Privacy Policy" or "Update"
5. A success message will confirm: "Privacy Policy updated successfully!"

**Content Guidelines:**
- Include information about data collection
- Explain how user data is used and stored
- Provide contact information for privacy concerns
- Ensure compliance with privacy laws (GDPR, etc.)

### Managing Terms & Conditions

**Purpose:** Update the Terms & Conditions page content.

**Steps:**
1. Navigate to the Pages section
2. Find the "Terms & Conditions" tab or section
3. Enter or edit the terms content in the text editor
4. Click "Save Terms & Conditions" or "Update"
5. A success message will confirm: "Terms & Conditions updated successfully!"

**Content Guidelines:**
- Include terms of use for the website
- Explain user responsibilities
- Include disclaimers if applicable
- Keep content legally compliant

### Saving All Pages at Once

**Alternative Method:** Some interfaces allow you to update all pages at once.

**Steps:**
1. Navigate to the Pages section
2. Fill in or update content for all three pages:
   - Cookie Policy
   - Privacy Policy
   - Terms & Conditions
3. Click "Save" or "Update All"
4. A success message will confirm: "Pages updated successfully!"

### Text Editor Features

The text editor typically includes:
- Bold, italic, underline formatting
- Bullet points and numbered lists
- Headings and subheadings
- Link insertion
- Image insertion
- HTML editing capabilities

### Best Practices

- **Legal Compliance:**
  - Ensure all policies comply with applicable laws
  - Review policies regularly
  - Consult legal counsel if needed

- **Content Updates:**
  - Keep policies current with your practices
  - Update when you make changes to data handling
  - Notify users of significant changes

- **Clarity:**
  - Write in clear, understandable language
  - Use proper formatting for readability
  - Organize content with headings and sections

---

## SEO Management

### Overview

SEO (Search Engine Optimization) Management allows you to configure SEO settings for different pages on your website. This helps improve your website's visibility in search engines.

### Understanding SEO

SEO helps your website appear in search engine results. Key elements include:
- **Title:** The title that appears in search results
- **Description:** A brief description shown in search results
- **Keywords:** Important words related to your content
- **Schema Markup:** Structured data that helps search engines understand your content

### Accessing SEO Management

1. Click on "SEO" in the navigation menu
2. You'll see a list of all SEO entries for different pages

### Adding SEO Settings for a New Page

**Steps:**
1. Navigate to the SEO section
2. Click "Add New" or find the SEO form
3. Fill in the form:
   - **Page Name:** Enter the name/identifier of the page (required)
     - Examples: "home", "about-us", "gallery", etc.
   - **Title:** Enter the SEO title (required)
     - This appears in browser tabs and search results
     - Keep it concise (50-60 characters recommended)
   - **Description:** Enter the meta description (required)
     - This appears in search result snippets
     - Keep it between 150-160 characters
   - **Keywords:** Enter relevant keywords (optional)
     - Separate keywords with commas
     - Example: "temple, museum, kalupur, heritage"
   - **Schema Markup:** Enter structured data JSON-LD code (optional)
     - Advanced feature for rich search results
4. Click "Save"
5. A success message will confirm: "Page added successfully"

### Editing Existing SEO Settings

**Steps:**
1. Navigate to the SEO section
2. Find the page you want to edit
3. Click the "Edit" button
4. Modify the fields:
   - Update the title if needed
   - Update the description if needed
   - Update keywords if needed
   - Update schema markup if needed
5. Click "Update"
6. A success message will confirm: "SEO data updated successfully"

**Note:** Title and Keywords are required fields when editing.

### Deleting SEO Settings

**Steps:**
1. Navigate to the SEO section
2. Find the SEO entry you want to delete
3. Click the "Delete" button
4. Confirm the deletion if prompted
5. A success message will confirm: "SEO data deleted successfully"

**Warning:** Deleting SEO settings may affect your search engine rankings for that page.

### SEO Best Practices

#### Title Optimization

- Keep titles between 50-60 characters
- Include your main keyword
- Make it compelling and descriptive
- Include your brand/museum name if space allows

**Example:**
- Good: "Kalupur Museum - Heritage Temple & Cultural Center"
- Too Long: "Welcome to the Amazing Kalupur Museum Where You Can Experience Rich Cultural Heritage and Spiritual Journey"

#### Description Optimization

- Keep descriptions between 150-160 characters
- Include a call-to-action
- Mention key benefits or features
- Include relevant keywords naturally

**Example:**
- Good: "Visit Kalupur Museum to explore rich cultural heritage, spiritual experiences, and historical artifacts. Book your visit today!"

#### Keywords Strategy

- Focus on 5-10 relevant keywords
- Use location-based keywords
- Include related terms
- Avoid keyword stuffing

**Example:**
- "kalupur museum, temple, heritage, culture, spiritual, Gujarat, India"

#### Schema Markup

Schema markup helps search engines understand your content better. Common types include:
- Organization schema
- LocalBusiness schema
- Event schema
- Article schema

**Note:** Schema markup requires technical knowledge. Consult with a developer if needed.

### Viewing SEO Settings

- All SEO entries are displayed in a list
- You can see the page name, title, and description preview
- Entries are organized by page name

### Testing SEO

After updating SEO settings:
1. Wait a few days for search engines to crawl your site
2. Use Google Search Console to monitor performance
3. Check how your pages appear in search results
4. Make adjustments based on performance data

---

## Settings Management

### Overview

Settings Management allows you to configure general website settings, including contact information, logo, description, and other site-wide configurations.

### Accessing Settings Management

1. Click on "Settings" in the navigation menu
2. You'll see the Settings management interface

### Managing Website Logo

**Purpose:** Upload or update the website logo that appears throughout the site.

**Steps:**
1. Navigate to the Settings section
2. Find the "Logo" upload field
3. Click "Choose File" or "Browse"
4. Select a logo image file from your computer
5. Supported formats: JPEG, PNG, JPG, GIF
6. Maximum file size: 2MB
7. Click "Save" or "Update Settings"
8. A success message will confirm: "Settings updated successfully"

**Best Practices:**
- Use a high-quality logo image
- Ensure the logo is clear and recognizable
- Use appropriate file format (PNG with transparency recommended)
- Keep file size reasonable

### Managing Website Description

**Purpose:** Set or update the main description/about text for your website.

**Steps:**
1. Navigate to the Settings section
2. Find the "Description" text field
3. Enter or edit the description text
4. Click "Save"
5. A success message will confirm the update

**Content Guidelines:**
- Write a compelling description of your museum/temple
- Include key information visitors should know
- Keep it concise but informative
- Update it as your organization evolves

### Managing Contact Information

#### Email Address

**Steps:**
1. Navigate to the Settings section
2. Find the "Email" field
3. Enter a valid email address
4. Click "Save"

**Purpose:** This email may be used for contact forms and general inquiries.

#### Phone Number

**Steps:**
1. Navigate to the Settings section
2. Find the "Phone Number" field
3. Enter the contact phone number
4. Click "Save"

**Format:** Include country code if needed (e.g., +91 for India)

#### WhatsApp Number

**Steps:**
1. Navigate to the Settings section
2. Find the "WhatsApp Number" field
3. Enter the WhatsApp contact number
4. Click "Save"

**Note:** This enables WhatsApp contact functionality on the website.

### Managing Physical Address

**Steps:**
1. Navigate to the Settings section
2. Find the "Address" field
3. Enter the complete physical address
4. Click "Save"

**Include:**
- Street address
- City
- State/Province
- Postal/ZIP code
- Country

### Managing Google Maps/Iframe

**Purpose:** Add or update the Google Maps embed code for location display.

**Steps:**
1. Navigate to the Settings section
2. Find the "Iframe Key" or "Google Maps" field
3. You can either:
   - Paste the full iframe HTML code from Google Maps
   - Paste just the iframe src URL
4. The system will automatically extract the URL if you paste full HTML
5. Click "Save"

**How to Get Google Maps Embed Code:**
1. Go to Google Maps
2. Search for your location
3. Click "Share" → "Embed a map"
4. Copy the iframe code
5. Paste it into the settings field

### Viewing Current Settings

- All current settings are displayed on the settings page
- You can see existing logo, description, contact info, etc.
- Make changes as needed and save

### Best Practices

- **Keep Information Updated:**
  - Regularly review and update contact information
  - Ensure email and phone numbers are current
  - Update address if you relocate

- **Logo Management:**
  - Use consistent branding
  - Ensure logo displays well on all devices
  - Update logo when rebranding

- **Description:**
  - Keep description current and accurate
  - Reflect your current mission and offerings
  - Update when you add new services or features

---

## Donation Management

### Overview

Donation Management allows you to view and manage donation records submitted through your website.

### Accessing Donation Management

1. Click on "Donations" in the navigation menu
2. You'll see a list of all donation records

### Viewing Donation Records

**Information Displayed:**
Each donation record typically includes:
- **Donor Name:** The name of the person making the donation
- **Email:** Contact email address
- **Phone:** Contact phone number
- **Address:** Complete address of the donor
- **Country:** Donor's country
- **State:** Donor's state/province
- **City:** Donor's city
- **Pincode:** Postal/ZIP code
- **Amount:** Donation amount
- **Mandir:** Related temple/mandir information
- **Donation Type:** Type of donation
  - Donation to Trust Fund
  - Mahapuja
  - Mandir Nirman
  - Yagna
  - Dharmado
- **Date:** Date and time of donation submission

### Understanding Donation Types

1. **Donation to Trust Fund:** General donations to the trust
2. **Mahapuja:** Donations for Mahapuja ceremonies
3. **Mandir Nirman:** Donations for temple construction
4. **Yagna:** Donations for Yagna ceremonies
5. **Dharmado:** Religious donations

### Managing Donations

**Viewing Details:**
- Click on a donation record to view full details
- All information submitted by the donor is displayed

**Exporting Data:**
- Some systems allow exporting donation records
- Check if there's an "Export" or "Download" button
- Data can typically be exported as CSV or Excel

### Donation Process (Frontend)

When visitors submit donations through your website:

1. **Visitor Fills Form:**
   - Provides personal information
   - Selects donation type
   - Enters donation amount
   - Provides address details

2. **System Validation:**
   - Validates all required fields
   - Checks email format
   - Ensures donation type is valid

3. **Donation Storage:**
   - Valid donations are saved to the database
   - You can view them in the admin panel
   - Donors receive confirmation (if configured)

### Best Practices

- **Regular Monitoring:**
  - Check donation records regularly
  - Follow up with donors as needed
  - Acknowledge donations appropriately

- **Data Management:**
  - Keep donation records organized
  - Export data for accounting purposes
  - Maintain records for tax/legal compliance

- **Privacy:**
  - Protect donor information
  - Follow data protection regulations
  - Use information only for intended purposes

---

## Pooja Booking Management

### Overview

Pooja Booking Management allows you to view and manage Pooja booking requests submitted by visitors through your website.

### Accessing Pooja Booking Management

1. Click on "Pooja Bookings" in the navigation menu
   - Or navigate to `/pooja-booking` route
2. You'll see a list of all Pooja booking requests

### Viewing Booking Requests

**Information Displayed:**
Each booking request includes:
- **First Name:** Visitor's first name
- **Last Name:** Visitor's last name
- **Village:** Visitor's village/town
- **Location:** Domestic or International
- **Phone Number:** Contact phone number
- **Way of Contact:** Preferred contact method
- **Booking Date:** Requested date for the Pooja

### Understanding Booking Information

#### Location Types

- **Domestic:** Visitors from within the country
- **International:** Visitors from outside the country

#### Way of Contact

This indicates how the visitor prefers to be contacted:
- Phone call
- WhatsApp
- Email
- Other specified methods

### Managing Bookings

#### Reviewing Bookings

1. **View All Bookings:**
   - See all booking requests in chronological order
   - Check which dates are requested
   - Identify any date conflicts

2. **Check Availability:**
   - The system prevents double-booking on the same date
   - If a date is already booked, new requests for that date will be rejected
   - You can see which dates are taken

#### Contacting Visitors

**Steps:**
1. Review the booking request
2. Note the phone number and preferred contact method
3. Contact the visitor using the provided information
4. Confirm booking details
5. Provide any additional information needed

#### Processing Bookings

**Workflow:**
1. Review booking request
2. Check date availability
3. Contact visitor to confirm
4. Process the booking
5. Update your calendar/schedule
6. Follow up as needed

### Booking System Features

#### Date Availability Check

- The system automatically checks if a date is already booked
- Visitors cannot book dates that are already taken
- You'll see an error message: "This date is already booked" if someone tries

#### Booking Storage

- All valid bookings are stored in the database
- Each booking has a unique identifier
- Booking history is maintained for records

### Best Practices

- **Regular Monitoring:**
  - Check booking requests daily
  - Respond to bookings promptly
  - Keep track of booked dates

- **Communication:**
  - Contact visitors within 24-48 hours
  - Confirm booking details
  - Provide clear instructions
  - Answer any questions

- **Organization:**
  - Maintain a calendar of booked dates
  - Plan ahead for special events
  - Coordinate with your team

- **Follow-up:**
  - Send reminders before booked dates
  - Confirm attendance
  - Handle cancellations professionally

### Troubleshooting

**Problem:** Cannot see booking requests

**Solutions:**
- Verify you're accessing the correct section
- Check if there are any bookings submitted
- Refresh the page
- Contact technical support if needed

**Problem:** Date conflicts

**Solutions:**
- Review all bookings for the date
- Contact visitors to resolve conflicts
- Consider implementing a waiting list
- Update your booking policy if needed

---

## Troubleshooting

### Common Issues and Solutions

#### Login Problems

**Issue:** Cannot log in with correct credentials

**Solutions:**
- Clear browser cache and cookies
- Try a different browser
- Check if Caps Lock is enabled
- Verify you're using the correct email format
- Contact system administrator

**Issue:** Session expired

**Solutions:**
- Log in again
- Check "Remember Me" option if available
- Ensure cookies are enabled in your browser

#### Image Upload Issues

**Issue:** Cannot upload images

**Solutions:**
- Check file size (should be under 2MB for most images)
- Verify file format is supported (JPEG, PNG, JPG, GIF, WEBP)
- Check internet connection
- Try a different image file
- Clear browser cache

**Issue:** Images not displaying

**Solutions:**
- Verify image was uploaded successfully
- Check image file path
- Refresh the page
- Try uploading again

#### Saving/Updating Issues

**Issue:** Changes not saving

**Solutions:**
- Check internet connection
- Verify all required fields are filled
- Check for error messages
- Try refreshing the page and saving again
- Clear browser cache

**Issue:** Getting validation errors

**Solutions:**
- Read the error message carefully
- Ensure all required fields are filled
- Check field formats (email, phone, etc.)
- Verify data meets requirements

#### Navigation Issues

**Issue:** Cannot access certain sections

**Solutions:**
- Verify you're logged in
- Check if you have proper permissions
- Try logging out and logging back in
- Clear browser cache
- Contact administrator

#### Performance Issues

**Issue:** Pages loading slowly

**Solutions:**
- Check internet connection speed
- Close unnecessary browser tabs
- Clear browser cache and cookies
- Try a different browser
- Contact technical support

### Getting Help

If you encounter issues not covered in this manual:

1. **Check Error Messages:**
   - Read any error messages carefully
   - Note the exact error text
   - Take a screenshot if possible

2. **Document the Problem:**
   - Note what you were trying to do
   - Record the steps you took
   - Note when the problem occurred

3. **Contact Support:**
   - Reach out to your system administrator
   - Provide detailed information about the issue
   - Include screenshots if possible

---

## Appendix

### A. Quick Reference Guide

#### Common Tasks

**Adding Content:**
1. Navigate to the relevant section
2. Fill in the form
3. Click "Save"

**Editing Content:**
1. Navigate to the section
2. Find the item to edit
3. Click "Edit"
4. Make changes
5. Click "Update"

**Deleting Content:**
1. Navigate to the section
2. Find the item to delete
3. Click "Delete"
4. Confirm deletion

#### Supported Image Formats

- JPEG (.jpg, .jpeg)
- PNG (.png)
- GIF (.gif)
- WEBP (.webp)
- SVG (.svg) - for some sections

#### File Size Recommendations

- Images: Under 2MB recommended
- Optimize images before uploading
- Use compression tools if needed

### B. Keyboard Shortcuts

- **Ctrl + S** (Windows) or **Cmd + S** (Mac): Save (in some forms)
- **Enter:** Submit forms
- **Esc:** Cancel or close dialogs

### C. Browser Compatibility

Recommended browsers:
- Google Chrome (latest version)
- Mozilla Firefox (latest version)
- Safari (latest version)
- Microsoft Edge (latest version)

### D. Security Best Practices

1. **Password Security:**
   - Use a strong, unique password
   - Change password regularly
   - Don't share your password
   - Log out when finished

2. **Session Management:**
   - Always log out when done
   - Don't leave your session open on shared computers
   - Use secure networks when possible

3. **Data Protection:**
   - Be careful when deleting content
   - Verify information before saving
   - Keep backups of important data

### E. Glossary

- **Admin Panel:** The backend interface for managing website content
- **Dashboard:** The main control center after logging in
- **Slug:** A URL-friendly identifier for pages/content
- **SEO:** Search Engine Optimization - techniques to improve search visibility
- **Schema Markup:** Structured data that helps search engines understand content
- **Frontend:** The public-facing website visitors see
- **Backend:** The admin panel you're using
- **CRUD:** Create, Read, Update, Delete - basic data operations





---



