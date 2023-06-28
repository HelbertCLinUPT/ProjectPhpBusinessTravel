require('dotenv').config();
const express = require("express");
const { Configuration, OpenAIApi } = require("openai");
const cors = require("cors");

const app = express();
const port = 3040;

const configuration = new Configuration({
  apiKey: process.env.OPENAI_API_KEY,
});
const openai = new OpenAIApi(configuration);

app.use(express.json());

const corsOptions = {
  origin: '*',
};

app.use(cors(corsOptions));

const defaultRequestBody = {
  model: "gpt-3.5-turbo",
  messages: [
    {
      role: "system",
      content: "Eres un asistente de viajes.",
    },
  ],
};

app.post("/openai", async (req, res) => {
  try {
    const { content, messages } = req.body;

    const requestBody = JSON.parse(JSON.stringify(defaultRequestBody));
    
    if (messages && Array.isArray(messages)) {
      requestBody.messages.push(...messages);
    }
    
    requestBody.messages.push({ role: "user", content });

    const completion = await openai.createChatCompletion(requestBody);

    const response = completion.data.choices[0].message;
    res.json(response);
  } catch (error) {
    console.error("Error:", error);
    res.status(500).json({ error: "Internal Server Error" });
  }
});

app.listen(port, () => {
  console.log(`Servidor escuchando en el puerto ${port}`);
});
