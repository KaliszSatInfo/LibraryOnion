<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederGenre extends Seeder
{
    public function run()
    {
        $genres = [
            'Fantasy', 'High Fantasy', 'Urban Fantasy', 'Dark Fantasy',
            'Science Fiction', 'Hard Science Fiction', 'Space Opera', 'Dystopian', 'Cyberpunk', 'Steampunk',
            'Mystery', 'Cozy Mystery', 'Crime', 'Detective', 'Thriller', 'Psychological Thriller', 'Legal Thriller',
            'Horror', 'Gothic Horror', 'Paranormal Horror', 'Slasher', 'Supernatural',
            'Romance', 'Historical Romance', 'Contemporary Romance', 'Romantic Comedy', 'Paranormal Romance',
            'Adventure', 'Action Adventure', 'Survival', 'Sea Adventure', 'Espionage',
            'Historical Fiction', 'Alternate History', 'War Fiction', 'Western',
            'Young Adult', 'YA Fantasy', 'YA Romance', 'YA Dystopian',
            'Children\'s', 'Middle Grade', 'Fairy Tale Retelling',
            'Literary Fiction', 'Women\'s Fiction', 'Coming of Age', 'Drama',
            'Biography', 'Autobiography', 'Memoir',
            'Self-help', 'Motivational', 'Personal Development', 'Productivity',
            'True Crime', 'Forensic', 'Police Procedural',
            'Science', 'Astronomy', 'Biology', 'Chemistry', 'Physics', 'Earth Science',
            'History', 'Ancient History', 'Medieval History', 'Modern History', 'Military History',
            'Philosophy', 'Ethics', 'Logic', 'Metaphysics',
            'Religion', 'Christianity', 'Islam', 'Buddhism', 'Spirituality', 'Occult',
            'Health', 'Nutrition', 'Fitness', 'Mental Health',
            'Cooking', 'Baking', 'Vegan', 'Vegetarian', 'Grilling',
            'Travel', 'Travel Memoir', 'Guidebook',
            'Business', 'Entrepreneurship', 'Marketing', 'Finance', 'Economics',
            'Technology', 'AI', 'Blockchain', 'Cybersecurity', 'Software Development',
            'Art', 'Photography', 'Design', 'Architecture',
            'Education', 'Language Learning', 'Pedagogy', 'Study Guides',
            'Politics', 'Political Science', 'Current Affairs', 'Geopolitics',
            'Law', 'Criminal Law', 'Constitutional Law',
            'Poetry', 'Haiku', 'Sonnet', 'Free Verse', 'Epic Poetry',
            'Comics', 'Graphic Novel', 'Manga', 'Webtoon',
            'Satire', 'Parody', 'Humor', 'Absurdist',
            'Anthology', 'Short Story', 'Flash Fiction',
            'Essay', 'Critical Essay', 'Opinion',
            'Music', 'Music Theory', 'Biography of Musicians',
            'Sports', 'Athletics', 'Team Sports', 'Extreme Sports',
            'Nature', 'Environment', 'Wildlife', 'Gardening',
            'Crafts', 'Knitting', 'Sewing', 'Woodworking',
            'Parenting', 'Pregnancy', 'Child Development',
            'Animals', 'Pet Care', 'Animal Behavior',
            'Magic Realism', 'Metafiction', 'Experimental Fiction',
            'LGBTQ+', 'Queer Fiction', 'Gay Romance', 'Trans Memoir',
            'Mythology', 'Folklore', 'Legend',
            'Zombies', 'Vampires', 'Werewolves',
            'Noir', 'Pulp Fiction', 'Hardboiled', 'Isekai'
        ];
        

        foreach ($genres as $genre) {
            $this->db->table('genre')->insert(['name' => $genre]);
        }
    }
}
