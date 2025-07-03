# Kalupur Mandir API Documentation

## Base URL
```
{APP_URL}/api
```

## Available Endpoints

### 1. Home Data
Get all data required for the home page including testimonials, prasadi darshan, and main video.

**Endpoint:** `GET /home-data`

**Response:**
```json
{
    "success": true,
    "data": {
        "prasadidarshan": [
            {
                "id": "integer",
                "prasadi_image": "string (full URL)",
                // other prasadi fields
            }
        ],
        "testimonials": [
            {
                "id": "integer",
                // testimonial fields
            }
        ],
        "main_video": "string (video link)"
    }
}
```

### 2. Yajman Data
Get paginated list of yajmans.

**Endpoint:** `GET /yajman-data`

**Query Parameters:**
- `limit` (optional): Number of records per page (default: 6)
- `offset` (optional): Number of records to skip (default: 0)

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": "integer",
            "image": "string (full URL)",
            // other yajman fields
        }
    ]
}
```

### 3. Testimonials
Get all testimonials.

**Endpoint:** `GET /testimonials`

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": "integer",
            // testimonial fields
        }
    ]
}
```

### 4. Event Gallery
Get paginated list of event galleries.

**Endpoint:** `GET /event-gallery`

**Query Parameters:**
- `limit` (optional): Number of records per page (default: 6)
- `offset` (optional): Number of records to skip (default: 0)

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": "integer",
            "image": "string (full URL)",
            // other event gallery fields
        }
    ]
}
```

### 5. Sub Event Gallery
Get paginated list of sub-event galleries for a specific event.

**Endpoint:** `GET /sub-event-gallery/{slug}`

**URL Parameters:**
- `slug`: Event gallery slug

**Query Parameters:**
- `limit` (optional): Number of records per page (default: 6)
- `offset` (optional): Number of records to skip (default: 0)

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": "integer",
            "image": "string (full URL)",
            // other sub event gallery fields
        }
    ]
}
```

### 6. Photo Gallery
Get paginated list of photo galleries.

**Endpoint:** `GET /photo-gallery`

**Query Parameters:**
- `limit` (optional): Number of records per page (default: 6)
- `offset` (optional): Number of records to skip (default: 0)

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": "integer",
            "image": "string (full URL)",
            // other photo gallery fields
        }
    ]
}
```

### 7. Sub Photo Gallery
Get paginated list of sub-photo galleries for a specific photo gallery.

**Endpoint:** `GET /sub-photo-gallery/{slug}`

**URL Parameters:**
- `slug`: Photo gallery slug

**Query Parameters:**
- `limit` (optional): Number of records per page (default: 6)
- `offset` (optional): Number of records to skip (default: 0)

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": "integer",
            "image": "string (full URL)",
            // other sub photo gallery fields
        }
    ]
}
```

### 8. Contact Us
Submit a contact form.

**Endpoint:** `POST /contact-us`

**Request Body:**
```json
{
    "first_name": "string (required)",
    "last_name": "string (required)",
    "email": "string (required, valid email)",
    "phone": "string (required)",
    "message": "string (required)"
}
```

**Response:**
```json
{
    "error": false,
    "message": "Message sent successfully"
}
```

### 9. Donation
Submit a donation.

**Endpoint:** `POST /donation`

**Request Body:**
```json
{
    "name": "string (required)",
    "email": "string (required, valid email)",
    "phone": "string (required)",
    "address": "string (required)",
    "country": "string (required)",
    "state": "string (required)",
    "city": "string (required)",
    "pincode": "string (required)",
    "amount": "number (required)",
    "mandir": "string (required)",
    "donation_type": "string (required)",
    "pan_number": "string (optional)",
    "note": "string (optional)"
}
```

**Donation Types:**
- `donation-to-trust-fund`
- `mahapuja`
- `mandir-nirman`
- `yagna`
- `dharmado`

**Response:**
```json
{
    "error": false,
    "message": "Donation submitted successfully"
}
```

### 10. Acharyas
Get paginated list of acharyas.

**Endpoint:** `GET /acharyas`

**Query Parameters:**
- `limit` (optional): Number of records per page (default: 10)
- `offset` (optional): Number of records to skip (default: 0)

**Response:**
```json
{
    "error": false,
    "data": [
        {
            "id": "integer",
            "image": "string (full URL)",
            // other acharya fields
        }
    ],
    "total": "integer"
}
```

## Error Handling

All endpoints return error responses in the following format:

```json
{
    "success": false,
    // or
    "error": true,
    "message": "Error message description"
}
```

Common HTTP Status Codes:
- 200: Success
- 404: Resource not found
- 422: Validation error
- 500: Server error

## Notes for Frontend Developer

1. All image URLs are returned as full URLs including the base URL
2. Pagination is implemented using limit/offset pattern
3. Form submissions should include all required fields
4. Handle error responses appropriately in the UI
5. Implement proper loading states for paginated data
6. Consider implementing retry logic for failed requests
7. Cache responses where appropriate to improve performance
8. Implement proper form validation before submission 