#!/usr/bin/env python3
"""
Generate beautiful placeholder images for photo gallery
Uses PIL to create professional-looking gradient images with text overlays
"""

from PIL import Image, ImageDraw, ImageFilter, ImageFont
import os
import random

# Image directory
img_dir = '/Users/hannahejimofor/dev/coderoom/photo-gallery/public/assets/images'

# Color palettes for different categories
palettes = {
    'hero': {
        'colors': ['#667eea', '#764ba2', '#f093fb', '#4facfe'],
        'size': (1920, 1080)
    },
    'featured': {
        'colors': [
            (['#667eea', '#764ba2'], 'Mountain Peaks'),
            (['#f093fb', '#f5576c'], 'Ocean Sunsets'),
            (['#4facfe', '#00f2fe'], 'Forest Trails'),
            (['#fa709a', '#fee140'], 'Urban Architecture')
        ],
        'size': (600, 600)
    },
    'category': {
        'items': [
            (['#667eea', '#764ba2'], 'Nature'),
            (['#fa709a', '#fee140'], 'Travel'),
            (['#f093fb', '#f5576c'], 'People'),
            (['#4facfe', '#00f2fe'], 'Urban')
        ],
        'size': (500, 300)
    }
}

def hex_to_rgb(hex_color):
    """Convert hex color to RGB tuple"""
    hex_color = hex_color.lstrip('#')
    return tuple(int(hex_color[i:i+2], 16) for i in (0, 2, 4))

def create_gradient_image(width, height, colors):
    """Create a gradient image with multiple colors"""
    image = Image.new('RGB', (width, height))
    pixels = image.load()
    
    # Convert hex colors to RGB
    rgb_colors = [hex_to_rgb(color) for color in colors]
    
    # Create gradient
    for y in range(height):
        for x in range(width):
            # Calculate interpolation
            ratio = x / width
            if len(rgb_colors) == 2:
                r = int(rgb_colors[0][0] * (1 - ratio) + rgb_colors[1][0] * ratio)
                g = int(rgb_colors[0][1] * (1 - ratio) + rgb_colors[1][1] * ratio)
                b = int(rgb_colors[0][2] * (1 - ratio) + rgb_colors[1][2] * ratio)
            else:
                # Multiple color gradient
                segment = ratio * (len(rgb_colors) - 1)
                idx = int(segment)
                local_ratio = segment - idx
                if idx >= len(rgb_colors) - 1:
                    idx = len(rgb_colors) - 2
                    local_ratio = 1
                
                c1, c2 = rgb_colors[idx], rgb_colors[idx + 1]
                r = int(c1[0] * (1 - local_ratio) + c2[0] * local_ratio)
                g = int(c1[1] * (1 - local_ratio) + c2[1] * local_ratio)
                b = int(c1[2] * (1 - local_ratio) + c2[2] * local_ratio)
            
            pixels[x, y] = (r, g, b)
    
    return image

def add_text_to_image(image, text, position='center'):
    """Add text overlay to image"""
    draw = ImageDraw.Draw(image)
    width, height = image.size
    
    # Use default font (will use system default)
    try:
        font = ImageFont.truetype("/System/Library/Fonts/Helvetica.ttc", size=60)
    except:
        font = ImageFont.load_default()
    
    # Get text size
    bbox = draw.textbbox((0, 0), text, font=font)
    text_width = bbox[2] - bbox[0]
    text_height = bbox[3] - bbox[1]
    
    # Calculate position
    if position == 'center':
        x = (width - text_width) // 2
        y = (height - text_height) // 2
    
    # Draw text with shadow
    draw.text((x + 2, y + 2), text, fill=(0, 0, 0, 128), font=font)
    draw.text((x, y), text, fill=(255, 255, 255), font=font)
    
    return image

def create_all_images():
    """Create all placeholder images"""
    print("Generating beautiful placeholder images...")
    
    # Create hero image
    print("Creating hero.jpg...")
    hero_colors = palettes['hero']['colors']
    hero_img = create_gradient_image(*palettes['hero']['size'], hero_colors)
    hero_img = hero_img.resize((1920, 1080), Image.Resampling.LANCZOS)
    hero_img.save(os.path.join(img_dir, 'hero.jpg'), 'JPEG', quality=90)
    
    # Create featured images
    featured_configs = palettes['featured']['colors']
    featured_names = ['featured-1.jpg', 'featured-2.jpg', 'featured-3.jpg', 'featured-4.jpg']
    
    for i, (colors, label) in enumerate(featured_configs):
        print(f"Creating {featured_names[i]}...")
        img = create_gradient_image(*palettes['featured']['size'], colors)
        # Add subtle pattern
        overlay = Image.new('RGBA', img.size, (255, 255, 255, 10))
        img = img.convert('RGBA')
        img = Image.alpha_composite(img, overlay)
        img = img.convert('RGB')
        img.save(os.path.join(img_dir, featured_names[i]), 'JPEG', quality=90)
    
    # Create category images
    category_configs = palettes['category']['items']
    category_names = ['category-nature.jpg', 'category-travel.jpg', 'category-people.jpg', 'category-urban.jpg']
    
    for i, (colors, label) in enumerate(category_configs):
        print(f"Creating {category_names[i]}...")
        img = create_gradient_image(*palettes['category']['size'], colors)
        img.save(os.path.join(img_dir, category_names[i]), 'JPEG', quality=90)
    
    print("✓ All images generated successfully!")

if __name__ == '__main__':
    # Ensure directory exists
    os.makedirs(img_dir, exist_ok=True)
    
    # Generate images
    create_all_images()
