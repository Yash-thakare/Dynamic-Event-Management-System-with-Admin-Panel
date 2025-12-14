import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { isToday, isFuture, isPast, format } from 'date-fns';
import './App.css';

const API_URL = 'http://localhost:8001/api/events';

function App() {
    const [events, setEvents] = useState([]);
    const [loading, setLoading] = useState(true);

    const fetchEvents = async() => {
        try {
            const response = await axios.get(API_URL);
            setEvents(response.data);
        } catch (error) {
            console.error('Error fetching events:', error);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchEvents();
    }, []);

    const categorizeEvents = (events) => {
        return {
            today: events.filter(event => isToday(new Date(event.date))),
            future: events.filter(event => isFuture(new Date(event.date))),
            past: events.filter(event => isPast(new Date(event.date))),
        };
    };

    const { today, future, past } = categorizeEvents(events);

    const renderSection = (title, eventList) => ( <
        div className = "section" >
        <
        h2 > { title }({ eventList.length }) < /h2> {
        eventList.length > 0 ? (
            eventList.slice(0, 3).map(event => ( <
                div key = { event.id }
                className = "event-card" >
                <
                h3 > { event.title } < /h3> <
                p > { event.description } < /p> <
                p > < strong > Date: < /strong> {format(new Date(event.date), 'yyyy-MM-dd')}</p > { event.time && < p > < strong > Time: < /strong> {event.time}</p > } { event.location && < p > < strong > Location: < /strong> {event.location}</p > } <
                /div>
            ))
        ) : ( <
            p > No events in this category. < /p>
        )
    } {
        eventList.length > 3 && < p className = "more" > ...and { eventList.length - 3 }
        more < /p>} < /
            div >
    );

    if (loading) return <div className = "loading" > Loading events... < /div>;

    return ( <
        div className = "App" >
        <
        header >
        <
        h1 > Dynamic Event Management System < /h1> <
        button onClick = { fetchEvents } > Refresh Events < /button> < /
        header > { renderSection("Today's Events", today) } { renderSection("Future Events", future) } { renderSection("Past Events", past) } <
        /div>
    );
}

export default App;