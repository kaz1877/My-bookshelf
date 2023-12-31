import axios from 'axios';

const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    withCredentials: true,

    headers: {
        "Content-Type": "application/json",
        "Access-Control-Allow-Origin": "*"
    }
});

export default api;