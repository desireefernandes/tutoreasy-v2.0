import { Checkbox } from "@radix-ui/react-checkbox";
import { FormEvent, useState } from "react";
import axios from "axios";
import { Envelope, Lock } from "phosphor-react";
import { Button } from "../components/Button";
import { Heading } from "../components/Heading";
import { TextInput } from "../components/TextInput";
import { Text } from "../components/Text";
import { Logo } from "../Logo";

export function Register() {
  const [isUserRegister, setIsUserRegister] = useState(false);

  async function handleRegister(event: FormEvent) {
    event.preventDefault();

    await axios.post("/sessions", {
      email: "gleicianegaldino@gmail.com",
      password: "12345678",
    });

    setIsUserRegister(true);
  }
  return (
    <div className="w-screen h-screen bg-white flex flex-col items-center justify-center text-gray-90">
      <header className="flex flex-col items-center">
        <Logo />

        <Heading size="lg">TutorEasy</Heading>

        <Text size="lg" className="text-black mt-1">
          Cadastre-se e comece a usar!
        </Text>
      </header>

      <form
        onSubmit={handleRegister}
        className="flex flex-col gap-4 items-stretch w-full max-w-[400px] mt-10"
      >
        {isUserRegister && <Text>Registro realizado!</Text>}

        <label htmlFor="nome" className="flex flex-col gap-3 font-semibold">
          <Text>Nome</Text>
          <TextInput.Root>
            <TextInput.Input id="nome" placeholder="Digite seu nome" />
          </TextInput.Root>
          </label>
          <label htmlFor="sobrenome" className="flex flex-col gap-3 font-semibold">
          <Text>Sobrenome</Text>
          <TextInput.Root>
            <TextInput.Input id="sobrenome" placeholder="Digite seu sobrenome" />
          </TextInput.Root>
          </label>

        <label htmlFor="email" className="flex flex-col gap-3 font-semibold">
          <Text>Endereço de e-mail</Text>
          <TextInput.Root>
            <TextInput.Icon>
              <Envelope />
            </TextInput.Icon>
            <TextInput.Input id="email" placeholder="Digite o e-mail" />
          </TextInput.Root>
        </label>
        <label htmlFor="conf-email" className="flex flex-col gap-3 font-semibold">
          <Text>Confirme o e-mail</Text>
          <TextInput.Root>
            <TextInput.Icon>
              <Envelope />
            </TextInput.Icon>
            <TextInput.Input id="conf-email" placeholder="Confirme o e-mail" />
          </TextInput.Root>
        </label>
        <label htmlFor="password" className="flex flex-col gap-3 font-semibold">
          <Text>Sua senha</Text>
          <TextInput.Root>
            <TextInput.Icon>
              <Lock />
            </TextInput.Icon>
            <TextInput.Input id="password" placeholder="********" />
          </TextInput.Root>
        </label>
        <label htmlFor="conf-password" className="flex flex-col gap-3 font-semibold">
          <Text>Confirme a senha</Text>
          <TextInput.Root>
            <TextInput.Icon>
              <Lock />
            </TextInput.Icon>
            <TextInput.Input id="password" placeholder="********" />
          </TextInput.Root>
        </label>
        
        <Button type="submit" className="mt-4">
          Confirmar
        </Button>
      </form>
      
    </div>
  );
}