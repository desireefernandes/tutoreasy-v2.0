import { Meta, StoryObj } from "@storybook/react";
import { within, userEvent, waitFor } from "@storybook/testing-library";
import { rest } from 'msw';
import { expect } from "@storybook/jest";
import { Register } from "./Register";

export default {
  title: "Pages/Register",
  component: Register,
  args: {},
  argTypes: {},
  parameters: {
    msw: {
      handlers: [
        rest.post('/sessions', (req, res, ctx) => {
          return res(ctx.json({
            message: 'Registro realizado!'
          }))
        })
      ]
    },
  }
} as Meta;

export const Default: StoryObj = {
  play: async ({ canvasElement }) => {
    const canvas = within(canvasElement);

    userEvent.type(
      canvas.getByPlaceholderText("Digite seu e-mail"),
      "gleicianegaldino25@gmail.com"
    );
    userEvent.type(canvas.getByPlaceholderText("********"), "12345678");

    userEvent.click(canvas.getByRole("button"));

    await waitFor(() => {
      expect(canvas.getByText("Login realizado!")).toBeInTheDocument();
    });
  },
};