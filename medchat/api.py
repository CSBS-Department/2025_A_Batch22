import openai

openai.api_key = "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"
def api(prompt):
    prompt = prompt.lower()
    if "how to" not in prompt:
        prompt = "How to cure" + prompt + "?"
    response = openai.Completion.create(
        model="text-davinci-003",
        prompt=prompt,
        temperature=0.9,
        max_tokens=100,
        top_p=1,
        frequency_penalty=0.0,
        presence_penalty=0.0
    )
    return response.choices[0].text

def main():
    prompt = input("Enter your prompt: ")
    print(api(prompt))

if __name__ == "__main__":
    main()