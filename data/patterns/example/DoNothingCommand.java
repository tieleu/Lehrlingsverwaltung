package example;

public class DoNothingCommand implements Command {

	@Override
	public void execute() {
		System.out.println("Do nothing.");
	}
}
